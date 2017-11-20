<?php

namespace App\Http\Controllers;

use App\KioskStudent;
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
        $this->middleware('admin')->except(['index', 'show']);
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
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

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
        $kiosk->update($request->only(['name','room']));
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
    }


    /**
     * Assign a user to the selected kiosk
     *
     * @param $kiosk
     * @param User $user
     * @return bool
     */
    public function attach($kiosk, User $user)
    {
        //TODO - verify and sanitize user input

        if (! $user->kiosks->contains($kiosk)) {
            $user->kiosks()->attach($kiosk);
            return response()->json(['status'=>'ok']);
        }else{
            return response()->json(['status'=>'exists']);
        }

    }

    /**
     * Delete a user from the selected kiosk
     *
     * @param $kiosk
     * @param User $user
     * @return bool
     */
    public function detach($kiosk, User $user)
    {
        //TODO - verify and sanitize user input
        $user->kiosks()->detach($kiosk);
        return response()->json(['status'=>'ok']);
    }

    public function toggleStudent($kiosk, Student $student)
    {
        //TODO - verify and sanitize user input
        //TODO - Log users into the kiosk_logs table
        $present = $student->kiosks->contains($kiosk);
        if($present){
            $student->kiosks()->detach($kiosk);
            return response()->json(['status'=>'detached', 'student'=>$student->toArray()]);
        }
        else{
            $student->kiosks()->attach($kiosk);
            return response()->json(['status'=>'attached', 'student'=>$student->toArray()]);
        }
    }

}

?>