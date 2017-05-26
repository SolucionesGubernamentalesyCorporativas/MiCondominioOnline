<?php

namespace App\Http\Controllers;

use App\User;
use App\Membership;
use App\Role;
use App\Estate;
use App\Condo;
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
        $condos = Condo::all();
        request('condo') != NULL ? $condorequest = Condo::find(request('condo')) : $condorequest = NULL;
        request('role') != NULL ? $rolerequest = Condo::find(request('role')) : $rolerequest = NULL;


        if (request()->has('sort')) {
            $data = User::orderBy('name', request('sort'))
                                ->paginate(12)
                                ->appends('sort', request('sort'));
        } elseif (request()->has('role')) {
            $data = User::where('role_id', request('role'))
                                ->paginate(12)
                                ->appends('role', request('role'));
        } elseif (request()->has('condo')) {
            $condo = request('condo');
            $data = User::whereHas('condos', function ($query) {
                $query->where('id', request('condo'));
            })->paginate(12)
            ->appends('condo', request('condo'));
        }
        else
            $data = User::paginate(12);

        return view('users.index')->with('data', $data)
                                ->with('roles', $roles)
                                ->with('condos', $condos)
                                ->with('condorequest', $condorequest)
                                ->with('rolerequest', $rolerequest);
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
        $estates = Estate::all();
        $condos = Condo::all();

        return view('users.create')->with('memberships', $memberships)
                                    ->with('roles', $roles)
                                    ->with('estates', $estates)
                                    ->with('condos', $condos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUser $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = bcrypt($request->password);

        $membership = Membership::find($request->membership_id);
        $user->membership()->associate($membership);
        $role = Role::find($request->role_id);
        $user->role()->associate($role);

        $user->save();

        if ($request->estate_ids != NULL) {
            $ids = explode(",", $request->estate_ids);
        
            foreach ($ids as $id) {
                $estate = Estate::find($id);
                $user->estates()->attach($estate);
            }
        }

        if ($request->condo_ids != NULL) {
            $ids = explode(",", $request->condo_ids);

            foreach ($ids as $id) {
                $condo = Condo::find($id);
                $user->condos()->attach($condo);
            }
        }

        return redirect()->route('users.index')
                        ->with('success','Usuario creado satisfactoriamente');
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
        $estates = Estate::all();
        $condos = Condo::all();

        $idsestates = NULL;
        $idscondos = NULL;

        foreach ($user->estates as $estate) {
            $idsestates .= strval($estate->id) . ",";
        }

        foreach ($user->condos as $condo) {
            $idscondos .= strval($condo->id) . ",";
        }

        return view('users.edit')->with('user', $user)
                                ->with('memberships', $memberships)
                                ->with('roles', $roles)
                                ->with('estates', $estates)
                                ->with('condos', $condos)
                                ->with('idsestates', $idsestates)
                                ->with('idscondos', $idscondos);
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
        $user = User::find($user->id);

        switch ($request->area) {
            case 'name':
                if ($request->name != NULL) {
                    $user->name = $request->name;
                }
                break;
            
            case 'lastname':
                if ($request->lastname != NULL) {
                    $user->lastname = $request->lastname;
                }
                break;
                
            case 'email':
                if ($request->email != NULL) {
                    $user->email = $request->email;
                }
                break;

            case 'phone':
                if ($request->phone != NULL) {
                    $user->phone = $request->phone;
                }
                break;

            case 'membership':
                if ($request->membership_id != NULL) {
                    $user->membership()->dissociate();
                    $membership = Membership::find($request->membership_id);
                    $user->membership()->associate($membership);
                }
                break;

            case 'role':
                if ($request->role_id != NULL) {
                    $user->role()->dissociate();
                    $role = Role::find($request->role_id);
                    $user->role()->associate($role);
                }
                break;

            case 'estate':
                if ($request->estate_ids != NULL) {
                    $user->estates()->detach();
                    $estateIds = explode(",", $request->estate_ids);
                
                    foreach ($estateIds as $estateId) {
                        $estate = Estate::find($estateId);
                        $user->estates()->attach($estate);
                    }
                } else {
                    $user->estates()->detach();
                }
                break;

            case 'condo':
                if ($request->condo_ids != NULL) {
                    $user->condos()->detach();
                    $condoIds = explode(",", $request->condo_ids);
                    
                    foreach ($condoIds as $condoId) {
                        $condo = Condo::find($condoId);
                        $user->condos()->attach($condo);
                    }
                } else {
                    $user->condos()->detach();
                }
                break;

            default:
                return redirect()->route('users.index')
                                ->with('error', 'Hubo un problema para actualizar el usuario, intente de nuevo');
                break;
        }

        $user->save();

        return redirect()->route('users.index')
                        ->with('success', 'Usuario actualizado satisfactoriamente');
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
                        ->with('success','Usuario eliminado satisfactoriamente');
    }
}
