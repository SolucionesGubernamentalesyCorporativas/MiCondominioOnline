<?php

namespace App\Http\Controllers;

use App\Resource;
use App\TypeOfResource;
use App\User;
use App\Http\Requests\StoreResource;
use App\Http\Requests\UpdateResource;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Resource::all();
        return view('resources.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $typeofresources = TypeOfResource::all();
        $users = User::all();
        return view('resources.create')->with('typeofresources', $typeofresources)
                                        ->with('users', $users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreResource $request)
    {
        Resource::create($request->all());
        return redirect()->route('resources.index')
                        ->with('success', 'Recurso guardado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function show(Resource $resource)
    {
        $resource = Resource::find($resource->id);
        return view('resources.show')->with('resource', $resource);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function edit(Resource $resource)
    {
        $resource = Resource::find($resource->id);
        $typeofresources = TypeOfResource::all();
        $users = User::all();
        return view('resources.edit')->with('resource', $resource)
                                    ->with('typeofresources', $typeofresources)
                                    ->with('users', $users);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateResource $request, Resource $resource)
    {
        Resource::find($resource->id)->update($request->all());
        return redirect()->route('resources.index')
                        ->with('success', 'Recurso actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function destroy(Resource $resource)
    {
        Resource::find($resource->id)->delete();
        return redirect()->route('resources.index')
                        ->with('success', 'Recurso eliminado satisfactoriamente');
    }
}
