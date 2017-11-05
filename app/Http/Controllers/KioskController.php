<?php

namespace App\Http\Controllers;

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
        $this->authorizeResource(\App\Kiosk::class);

    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('admin.kiosklist')->with('kiosks', Auth::user()->kiosks()->get());
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
    public function update($id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {

    }

    public function admin_index()
    {
    }

    public function attach(Kiosk $kiosk, User $user)
    {
        $user->attach($kiosk);

    }

    public function detach(Kiosk $kiosk, User $user)
    {
        $user->attach($kiosk);

    }

}

?>