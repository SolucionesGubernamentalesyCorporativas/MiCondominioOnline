<?php

namespace App\Http\Controllers;

use App\Condo;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCondo;
use App\Http\Requests\UpdateCondo;

class CondoController extends Controller
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
        $data = Condo::paginate(12);
        return view('condos.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('condos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCondo $request)
    {
        Condo::create($request->all());
        return redirect()->route('condos.index')
                        ->with('success', 'Item created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Condo  $condo
     * @return \Illuminate\Http\Response
     */
    public function show(Condo $condo)
    {
        $condo = Condo::find($condo->id);
        return view('condos.show')->with('condo', $condo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Condo  $condo
     * @return \Illuminate\Http\Response
     */
    public function edit(Condo $condo)
    {
        $condo = Condo::find($condo->id);
        return view('condos.edit')->with('condo', $condo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Condo  $condo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCondo $request, Condo $condo)
    {
        Condo::find($condo->id)->update($request->all());
        return redirect()->route('condos.index')
                        ->with('success', 'Item updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Condo  $condo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Condo $condo)
    {
        Condo::find($condo->id)->delete();
        return redirect()->route('condos.index')
                        ->with('success', 'Item deleted successfully');
    }
}
