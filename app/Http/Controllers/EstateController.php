<?php

namespace App\Http\Controllers;

use App\Estate;
use App\TypeOfEstate;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEstate;
use App\Http\Requests\UpdateEstate;

class EstateController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Estate::paginate(12);
        return view('estates.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $typeofestates = TypeOfEstate::all();
        return view('estates.create')->with('typeofestates', $typeofestates);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEstate $request)
    {
        Estate::create($request->all());
        return redirect()->route('estates.index')
                        ->with('success', 'Item created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Estate  $estate
     * @return \Illuminate\Http\Response
     */
    public function show(Estate $estate)
    {
        $estate = Estate::find($estate->id);
        return view('estates.show')->with('estate', $estate);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Estate  $estate
     * @return \Illuminate\Http\Response
     */
    public function edit(Estate $estate)
    {
        $estate = Estate::find($estate->id);
        $typeofestates = TypeOFEstate::all();
        return view('estates.edit')->with('estate', $estate)
                                    ->with('typeofestates', $typeofestates);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Estate  $estate
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEstate $request, Estate $estate)
    {
        Estate::update($request->all());
        return redirect()->route('estates.index')
                        ->with('success', 'Item updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Estate  $estate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estate $estate)
    {
        Estate::find($estate->id)->delete();
        return redirect()->route('estates.index')
                        ->with('success', 'Item deleted successfully');
    }
}
