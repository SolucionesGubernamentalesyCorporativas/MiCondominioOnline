<?php

namespace App\Http\Controllers;

use App\Incidence;
use App\TypeOfIncidence;
use App\Estate;
use App\Http\Requests\StoreIncidence;
use App\Http\Requests\UpdateIncidence;
use Illuminate\Http\Request;

class IncidenceController extends Controller
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
        $data = Incidence::paginate(12);
        return view('incidences.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $typeofincidences = TypeOfIncidence::all();
        $estates = Estate::all();
        return view('incidences.create')->with('typeofincidences', $typeofincidences)
                                        ->with('estates', $estates);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreIncidence $request)
    {
        Incidence::create($request->all());
        return redirect()->route('incidences.index')
                        ->with('success', 'Incidencia creada satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Incidence  $incidence
     * @return \Illuminate\Http\Response
     */
    public function show(Incidence $incidence)
    {
        $incidence = Incidence::find($incidence->id);
        return view('incidences.show')->with('incidence', $incidence);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Incidence  $incidence
     * @return \Illuminate\Http\Response
     */
    public function edit(Incidence $incidence)
    {
        $incidence = Incidence::find($incidence->id);
        $typeofincidences = TypeOfIncidence::all();
        $estates = Estate::all();
        return view('incidences.edit')->with('incidence', $incidence)
                                    ->with('typeofincidences', $typeofincidences)
                                    ->with('estates'. $estates);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Incidence  $incidence
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateIncidence $request, Incidence $incidence)
    {
        Incidence::find($incidence->id)->update($request->all());
        return redirect()->route('incidences.index')
                        ->with('success', 'Incidencia actualizada satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Incidence  $incidence
     * @return \Illuminate\Http\Response
     */
    public function destroy(Incidence $incidence)
    {
        Incidence::find($incidence->id)->delete();
        return redirect()->route('incidences.index')
                        ->with('success', 'Incidencia eliminada satisfactoriamente');
    }
}
