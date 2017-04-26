<?php

namespace App\Http\Controllers;

use App\TypeOfResource;
use App\Http\Requests\StoreTypeOfResource;
use App\Http\Requests\UpdateTypeOfResource;
use Illuminate\Http\Request;

class TypeOfResourceController extends Controller
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
        $data = TypeOfResource::paginate(12);
        return view('typeofresources.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('typeofresources.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTypeOfResource $request)
    {
        TypeOfResource::create($request->all());
        return redirect()->route('typeofresources.index')
                        ->with('success', 'Tipo de recurso creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TypeOfResource  $typeOfResource
     * @return \Illuminate\Http\Response
     */
    public function show(TypeOfResource $typeofresource)
    {
        $typeofresource = TypeOfResource::find($typeofresource->id);
        return view('typeofresources.show')->with('typeofresource', $typeofresource);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TypeOfResource  $typeOfResource
     * @return \Illuminate\Http\Response
     */
    public function edit(TypeOfResource $typeofresource)
    {
        $typeofresource = TypeOfResource::find($typeofresource->id);
        return view('typeofresources.edit')->with('typeofresource', $typeofresource);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TypeOfResource  $typeOfResource
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTypeOfResource $request, TypeOfResource $typeofresource)
    {
        TypeOfResource::find($typeofresource->id)->update($request->all());
        return redirect()->route('typeofresources.index')
                        ->with('success', 'Tipo de recurso actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TypeOfResource  $typeOfResource
     * @return \Illuminate\Http\Response
     */
    public function destroy(TypeOfResource $typeofresource)
    {
        TypeOfResource::find($typeofresource->id)->delete();
        return redirect()->route('typeofresources.index')
                        ->with('success', 'Tipo de recurso eliminado satisfactoriamente');
    }
}
