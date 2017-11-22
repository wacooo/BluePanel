<?php

namespace App\Http\Controllers;

use App\KioskSchedule;
use App\Student;
use App\User;
use App\Kiosk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class KioskController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin')->except(['show']);
        $this->authorizeResource(Kiosk::class);

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
     * Show the logs of a kiosk
     *
     * @param Request $request
     * @param Kiosk $kiosk
     * @return Response
     */
    public function logs(Request $request, Kiosk $kiosk)
    {
        if ($request->ajax()) {
            //return datatables($kiosk->logs)->toJson();
            //return datatables()->collection($kiosk->logs)->toJson();
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
        //TODO - verify and sanitize user input
        Kiosk::create($request->all());
        return redirect('/kiosks');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show(Kiosk $kiosk)
    {
        return view('kiosk')->with('kiosk', $kiosk);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit(Kiosk $kiosk)
    {
        return view('admin.editkiosk')->with('kiosk', $kiosk);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update(Request $request, Kiosk $kiosk)
    {
        //TODO - verify and sanitize user input
        $kiosk->update($request->only(['name', 'room']));
        return view('admin.editkiosk')->with('kiosk', $kiosk);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy(Kiosk $kiosk)
    {
        $kiosk->delete();
        return redirect()->action('KioskController@index');
    }


    /**
     * Assign a user to the selected kiosk
     *
     * @param $kiosk
     * @param User $user
     * @return bool
     */
    public function attach(Kiosk $kiosk, User $user)
    {
        //TODO - verify and sanitize user input

        if (!$user->kiosks->contains($kiosk->id)) {
            $user->kiosks()->attach($kiosk->id);
            return response()->json(['status' => 'ok']);
        } else {
            return response()->json(['status' => 'exists']);
        }

    }

    /**
     * Delete a user from the selected kiosk
     *
     * @param $kiosk
     * @param User $user
     * @return bool
     */
    public function detach(Kiosk $kiosk, User $user)
    {
        //TODO - verify and sanitize user input
        $user->kiosks()->detach($kiosk->id);
        return response()->json(['status' => 'ok']);
    }

    public function toggleStudent(Kiosk $kiosk, Student $student)
    {

        //TODO - verify and sanitize user input
        //TODO - Log users into the kiosk_logs table
        $present = $student->kiosks->contains($kiosk->id);
        if ($present) {
            //Add entry to logs
            $kiosk->logs()->attach($student->id, ['type' => 'Kiosk Sign Out']);

            //log the student in
            $student->kiosks()->detach($kiosk->id);

            //Return info for AJAX to display on the kiosk
            return response()->json(['status' => 'detached', 'student' => $student->toArray()]);
        } else {
            //Add entry to logs
            $kiosk->logs()->attach($student->id, ['type' => 'Kiosk Sign In']);

            //log the student in
            $student->kiosks()->attach($kiosk->id);

            return response()->json(['status' => 'attached', 'student' => $student->toArray()]);
        }
    }

    public function addScheduleTime(Request $request,Kiosk $kiosk)
    {
        //TODO Verify input
        $time = $request->input('time');

        //If the record exists delete it
        $schedule = KioskSchedule::where(['kiosk_id' => $kiosk->id, 'time' => $time])->first();
        if(!is_null($schedule))
            $schedule->delete();

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
        $time = $request->input('time');
        //Get the instance of the scheduler
        $schedule = KioskSchedule::where(['kiosk_id' => $kiosk->id, 'time' => $time])->first();
        //Bye bye schedule
        $schedule->delete();
        //Return with a status of removed
        return response()->json(['status' => 'removed']);
    }
}

?>