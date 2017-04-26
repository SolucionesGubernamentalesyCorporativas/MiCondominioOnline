<?php

namespace App\Http\Controllers;

use App\User;
use App\Membership;
use App\Role;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUser;
use App\Http\Requests\UpdateUser;

class UserController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        if (request()->has('sort')) {
            $data = User::orderBy('name', request('sort'))
                                ->paginate(12)
                                ->appends('sort', request('sort'));
        }
        elseif (request()->has('role')) {
            $data = User::where('role_id', request('role'))
                                ->paginate(12)
                                ->appends('role', request('role'));
        }
        else
            $data = User::paginate(12);
        return view('users.index')->with('data', $data)
                                ->with('roles', $roles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $memberships = Membership::all();
        $roles = Role::all();
        return view('users.create')->with('memberships', $memberships)
                                    ->with('roles', $roles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUser $request)
    {
        User::create([
            'name' => $request['name'],
            'lastname' => $request['lastname'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'password' => bcrypt($request['password']),
            'membership_id' => $request['membership_id'],
            'role_id' => $request['role_id']
        ]);
        return redirect()->route('users.index')
                        ->with('success','Usuario creaado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $user = User::find($user->id);
        return view('users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $user = User::find($user->id);
        $memberships = Membership::all();
        $roles = Role::all();
        return view('users.edit')->with('user', $user)
                                ->with('memberships', $memberships)
                                ->with('roles', $roles);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUser $request, User $user)
    {
        User::find($user->id)->update($request->all());
        return redirect()->route('users.index')
                        ->with('success','Item updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        User::find($user->id)->delete();
        return redirect()->route('users.index')
                        ->with('success','Item deleted successfully');
    }
}
