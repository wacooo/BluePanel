<?php

namespace App\Http\Controllers;

use App\User;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $users = User::all();
        return view('users')->with('users', $users);
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
    public function store()
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show(User $user)
    {

    }

    /**
     * Show the form for editinSSg the specified resource.
     *
     * @param  int $id
     * @return Response
     */

    public function edit(User $user)
    {
        return view('admin.edituser')->with(
            'user', $user::with('kiosks'
        )->first());

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id, $data)
    {
        return print_r($data);
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

}

?>