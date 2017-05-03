<?php

namespace App\Http\Controllers;

use App\TypeOfEstate;
use App\Http\Requests\StoreTypeOfEstate;
use App\Http\Requests\UpdateTypeOfEstate;
use Illuminate\Http\Request;

class TypeOfEstateController extends Controller
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
        $data = TypeOfEstate::paginate(12);
        return view('typeofestate.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('typeofestate.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTypeOfEstate $request)
    {
        TypeOfEstate::create($request->all());
        return redirect()->route('typeofestate.index')
                        ->with('success', 'Tipo de casa creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TypeOfEstate  $typeOfEstate
     * @return \Illuminate\Http\Response
     */
    public function show(TypeOfEstate $typeofestate)
    {
        $typeofestate = TypeOfEstate::find($typeofestate->id);
        return view('typeofestate.show')->with('typeofestate', $typeofestate);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TypeOfEstate  $typeOfEstate
     * @return \Illuminate\Http\Response
     */
    public function edit(TypeOfEstate $typeofestate)
    {
        $typeofestate = TypeOfEstate::find($typeofestate->id);
        return view('typeofestate.index')->with('typeofestate', $typeofestate);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TypeOfEstate  $typeOfEstate
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTypeOfEstate $request, TypeOfEstate $typeofestate)
    {
        TypeOFEstate::find($typeofestate->id)->update($request->all());
        return redirect()->route('typeofestate.index')
                        ->with('success', 'Tipo de casa actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TypeOfEstate  $typeOfEstate
     * @return \Illuminate\Http\Response
     */
    public function destroy(TypeOfEstate $typeofestate)
    {
        TypeOfEstate::find($typeofestate->id)->delete();
        return redirect()->route('typeofestate.index')
                        ->with('success', 'Tipo de casa eliminado satisfactoriamente');
    }
}
