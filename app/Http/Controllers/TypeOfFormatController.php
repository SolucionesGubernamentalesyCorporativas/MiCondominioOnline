<?php

namespace App\Http\Controllers;

use App\TypeOfFormat;
use App\Http\Requests\StoreTypeOfFormat;
use App\Http\Requests\UpdateTypeOfFormat;
use Illuminate\Http\Request;

class TypeOfFormatController extends Controller
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
        $data = TypeOfFormat::paginate(12);
        return view('typeofformats.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('typeofformats.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTypeOfFormat $request)
    {
        TypeOfFormat::create($request->all());
        return redirect()->route('typeofformats.index')
                        ->with('success', 'Tipo de formato creado satisfactoriamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TypeOfFormat  $typeOfFormat
     * @return \Illuminate\Http\Response
     */
    public function show(TypeOfFormat $typeofformat)
    {
        $typeofformat = TypeOfFormat::find($typeofformat);
        return view('typeofformats.show')->with('typeofformat', $typeofformat);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TypeOfFormat  $typeOfFormat
     * @return \Illuminate\Http\Response
     */
    public function edit(TypeOfFormat $typeofformat)
    {
        $typeofformat = TypeOfFormat::find($typeofformat);
        return view('typeofformats.edit')->with('typeofformat', $typeofformat);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TypeOfFormat  $typeOfFormat
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTypeOfFormat $request, TypeOfFormat $typeofformat)
    {
        TypeOfFormat::find($typeofformat->id)->update($request->all());
        return redirect()->route('typeofformats.index')
                        ->with('success', 'Tipo de formato actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TypeOfFormat  $typeOfFormat
     * @return \Illuminate\Http\Response
     */
    public function destroy(TypeOfFormat $typeofformat)
    {
        TypeOfFormat::find($typeofformat->id)->delete();
        return redirect()->route('typeofformats.index')
                        ->with('success', 'Tipo de formato eliminado satisfactoriamente');
    }
}
