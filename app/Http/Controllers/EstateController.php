<?php

namespace App\Http\Controllers;

use App\Estate;
use Illuminate\Http\Request;

class EstateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Estate::all();
        return view('estate.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('estate.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'number' => 'required',
            'rented' => 'required',
            'number_of_parking_lots' => 'required',
            'notes' => 'required'
        ]);

        Estate::create($request->all());
        return redirect()->route('estate.index')
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
        $estate = Estate::find($estate);
        return view('estate.show', compact('estate'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Estate  $estate
     * @return \Illuminate\Http\Response
     */
    public function edit(Estate $estate)
    {
        $estate = Estate::find($estate);
        return view('estate.edit', compact('estate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Estate  $estate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Estate $estate)
    {
        $this->validate($request, [
            'number' => 'required',
            'rented' => 'required',
            'number_of_parking_lots' => 'required',
            'notes' => 'required'
        ]);

        Estate::update($request->all());
        return redirect()->route('estate.index')
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
        Estate::find($estate)->delete();
        return redirect()->route('estate.index')
                        ->with('success', 'Item deleted successfully');
    }
}
