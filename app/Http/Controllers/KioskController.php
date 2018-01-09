<?php

namespace App\Http\Controllers;

use App\Kiosk;
use App\KioskSchedule;
use App\Student;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class KioskController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('lockout')->only(['show', 'toggleStudent']);
        $this->middleware('urlauth')->only(['logs', 'index']);
        $this->middleware('auth')->except(['show', 'toggleStudent', 'logs']);
        $this->middleware('admin')->except(['show', 'toggleStudent', 'logs']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('admin.kiosklist');
    }

    /**
     * Show the logs of a kiosk.
     *
     * @param Request $request
     * @param Kiosk $kiosk
     *
     * @return Response
     */
    public function logs(Request $request, Kiosk $kiosk)
    {
        if ($request->ajax()) {
            return datatables()->of($kiosk->logs)->make(true);
        } else {
            return view('kiosklogs')->with('kiosk', $kiosk);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.createkiosk');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $validatedRequest = $request->validate([
            'name' => 'required|string|max:20',
            'room' => 'required|integer',
        ]);

        Kiosk::create($validatedRequest + ['secret' =>  Hash::make(str_random(8))]);

        return redirect('/kiosks');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show(Request $request, Kiosk $kiosk)
    {
        if (Auth::check()) {
            $request->session()->put('lockout', true);
            Auth::logout();
        }

        return view('kiosk')->with(['kiosk' => $kiosk, 'lockout' => $request->session()->get('lockout')]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit(Kiosk $kiosk)
    {
        return view('admin.editkiosk')->with('kiosk', $kiosk);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update(Request $request, Kiosk $kiosk)
    {
        $validatedRequest = $request->validate([
            'name' => 'required|string|max:20',
            'room' => 'required|Integer',

        ]);

        $kiosk->update($validatedRequest);

        return view('admin.editkiosk')->with('kiosk', $kiosk);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy(Kiosk $kiosk)
    {
        $kiosk->delete();

        return redirect()->action('KioskController@index');
    }

    /**
     * Assign a user to the selected kiosk.
     *
     * @param $kiosk
     * @param User $user
     *
     * @return bool
     */
    public function attach(Kiosk $kiosk, User $user)
    {
        if (!$user->kiosks->contains($kiosk->id)) {
            $user->kiosks()->attach($kiosk->id);

            return response()->json(['status' => 'ok']);
        } else {
            return response()->json(['status' => 'exists']);
        }
    }

    /**
     * Delete a user from the selected kiosk.
     *
     * @param $kiosk
     * @param User $user
     *
     * @return bool
     */
    public function detach(Kiosk $kiosk, User $user)
    {
        $user->kiosks()->detach($kiosk->id);

        return response()->json(['status' => 'ok']);
    }

    public function toggleStudent(Kiosk $kiosk, Student $student)
    {
        $present = $student->kiosks->contains($kiosk->id);
        if ($present) {
            //Add entry to logs
            //$kiosk->logs()->attach($student->id, ['type' => 'Kiosk Sign Out']);
            $kiosk->logs()->attach($student->id, ['type' => 'Sign Out']);

            //log the student in
            $student->kiosks()->detach($kiosk->id);

            //Return info for AJAX to display on the kiosk
            return response()->json(['status' => 'detached', 'student' => $student->toArray()]);
        } else {
            //Add entry to logs
            //$kiosk->logs()->attach($student->id, ['type' => 'Kiosk Sign In']);
            $kiosk->logs()->attach($student->id, ['type' => 'Sign In']);

            //log the student in
            $student->kiosks()->attach($kiosk->id);

            return response()->json(['status' => 'attached', 'student' => $student->toArray()]);
        }
    }

    public function addScheduleTime(Request $request, Kiosk $kiosk)
    {
        $validatedRequest = $request->validate([
            'time' => 'string',
        ]);

        $time = $validatedRequest['time'];

        //If the record exists delete it
        $schedule = KioskSchedule::where(['kiosk_id' => $kiosk->id, 'time' => $time])->first();
        if (!is_null($schedule)) {
            $schedule->delete();
        }

        //Create a new schedule instance
        $kioskSchedule = new KioskSchedule();
        $kioskSchedule->time = $time;
        $kioskSchedule->kiosk_id = $kiosk->id;
        $kioskSchedule->save();

        //Respond with success
        return response()->json(['status' => 'added']);
    }

    public function deleteScheduleTime(Request $request, Kiosk $kiosk)
    {
        $validatedRequest = $request->validate([
            'time' => 'string',
        ]);

        $time = $validatedRequest['time'];
        //Get the instance of the scheduler
        $schedule = KioskSchedule::where(['kiosk_id' => $kiosk->id, 'time' => $time])->first();
        //Bye bye schedule
        $schedule->delete();
        //Return with a status of removed
        return response()->json(['status' => 'removed']);
    }
}
