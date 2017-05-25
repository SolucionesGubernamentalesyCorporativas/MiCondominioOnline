<?php

namespace App\Http\Controllers;

use App\TypeOfIncidence;
use App\Http\Requests\StoreTypeOfIncidence;
use App\Http\Requests\UpdateTypeOfIncidence;
use Illuminate\Http\Request;

class TypeOfIncidenceController extends Controller
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
        $data = TypeOfIncidence::paginate(12);
        return view('typeofincidences.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('typeofincidences.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTypeOfIncidence $request)
    {
        TypeOfIncidence::create($request->all());
        return redirect()->route('typeofincidences.index')
                        ->with('success', 'Tipo de incidencia creada satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TypeOfIncidence  $typeofincidence
     * @return \Illuminate\Http\Response
     */
    public function show(TypeOfIncidence $typeofincidence)
    {
        $typeofincidence = TypeOfIncidence::find($typeofincidence->id);
        return view('typeofincidences.show')->with('typeofincidence', $typeofincidence);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TypeOfIncidence  $typeofincidence
     * @return \Illuminate\Http\Response
     */
    public function edit(TypeOfIncidence $typeofincidence)
    {
        $typeofincidence = TypeOfIncidence::find($typeofincidence->id);
        return view('typeofincidences.edit')->with('typeofincidence', $typeofincidence);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TypeOfIncidence  $typeofincidence
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTypeOfIncidence $request, TypeOfIncidence $typeofincidence)
    {
        TypeOfIncidence::find($typeofincidence->id)->update($request->all());
        return redirect()->route('typeofincidences.index')
                        ->with('success', 'Tipo de incidencia actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TypeOfIncidence  $typeofincidence
     * @return \Illuminate\Http\Response
     */
    public function destroy(TypeOfIncidence $typeofincidence)
    {
        TypeOfIncidence::find($typeofincidence->id)->delete();
        return redirect()->route('typeofincidences.index')
                        ->with('success', 'Tipo de incidencia eliminada satisfactoriamente');
    }
}
