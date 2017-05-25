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
        return view('typeofestates.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('typeofestates.create');
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
        return redirect()->route('typeofestates.index')
                        ->with('success', 'Tipo de unidad privativa creada satisfactoriamente');
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
        return view('typeofestates.show')->with('typeofestate', $typeofestate);
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
        return view('typeofestates.index')->with('typeofestate', $typeofestate);
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
        return redirect()->route('typeofestates.index')
                        ->with('success', 'Tipo de unidad privativa actualizada satisfactoriamente');
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
        return redirect()->route('typeofestates.index')
                        ->with('success', 'Tipo de unidad privativa eliminada satisfactoriamente');
    }
}
