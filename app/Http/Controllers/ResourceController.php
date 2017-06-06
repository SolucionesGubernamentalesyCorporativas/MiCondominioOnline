<?php

namespace App\Http\Controllers;

use App\Resource;
use App\TypeOfResource;
use App\Estate;
use App\Http\Requests\StoreResource;
use App\Http\Requests\UpdateResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ResourceController extends Controller
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
        foreach (Auth::user()->condos as $condo) {
            foreach ($condo->estates as $estate) {
                $estateIds[] = $estate->id;
            }
        }

        $data = Resource::whereIn('estate_id', $estateIds)->paginate(12);

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
        foreach (Auth::user()->condos as $condo) {
            foreach ($condo->estates as $estate) {
                $estates[] = $estate;
            }
        }

        return view('resources.create')->with('typeofresources', $typeofresources)
                                        ->with('estates', $estates);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreResource $request)
    {
        $resource = new Resource;

        $resource->capacity = $request->capacity;
        $resource->fee = $request->fee;

        $typeOfResource = TypeOfResource::find($request->type_of_resource_id);
        $resource->typeOfResource()->associate($typeOfResource);
        $estate = Estate::find($request->estate_id);
        $resource->estate()->associate($estate);

        $resource->save();

        return redirect()->route('resources.index')
                        ->with('success', 'Recurso creado satisfactoriamente');
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
        
        foreach (Auth::user()->condos as $condo) {
            foreach ($condo->estates as $estate) {
                $estates[] = $estate;
            }
        }

        return view('resources.edit')->with('resource', $resource)
                                    ->with('typeofresources', $typeofresources)
                                    ->with('estates', $estates);

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
        $resource = Resource::find($resource->id);

        switch ($request->area) {
            case 'capacity':
                $resource->capacity = $request->capacity;
                break;
            
            case 'fee':
                $resource->fee = $request->fee;
                break;

            case 'typeofresource':
                $resource->typeOfResource()->dissociate();
                $typeOfResource = TypeOfResource::find($request->type_of_resource_id);
                $resource->typeOfResource()->associate($typeOfResource);
                break;

            case 'estate':
                $resource->estate()->dissociate();
                $estate = Estate::find($request->estate_id);
                $resource->estate()->associate($estate);
                break;

            default:
                return redirect()->route('resources.index')
                                ->with('error', 'Hubo un problema al actualizar el recurso, intente de nuevo');
                break;
        }

        $resource->save();
        
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
