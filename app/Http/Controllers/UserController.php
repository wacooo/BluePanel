<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('admin.users');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.createuser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $request->merge(['password' => Hash::make($request->password)]);
        $validatedRequest = $request->validate([
            'name_first'=> 'required|string|max:15',
            'name_last' => 'required|string|max:15',
            'email'     => 'required|email|unique:users|', 
            'username' => 'required|string|unique:users|min:5',
            'password'  => 'string|required',
        ]);
        User::create($validatedRequest);

        return redirect('/users');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show(User $user)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit(User $user)
    {
        return view('admin.edituser')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update(Request $request, User $user)
    {
        $validatedRequest = $request->validate([
            'name_first'=> 'required|string|max:15',
            'name_last' => 'required|string|max:15',
            'email'     => 'required|email',
            'username' => 'required|string|unique:users|min:5',
            'isadmin'   => 'required|integer',
        ]);
        //If there is a password change request
        $password = $request->input('password');
        if (isset($password)) {
            $user->update($validatedRequest);
            $user->password = Hash::make($password);
            $user->save();
        } else {
            $user->update($validatedRequest);
        }

        return view('admin.edituser')->with('user', $user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return view('admin.users');
    }
}
