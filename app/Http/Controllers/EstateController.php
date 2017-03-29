<?php

namespace App\Http\Controllers;

use App\Estate;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEstate;
use App\Http\Requests\UpdateEstate;

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
        return view('estates.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('estates.create');
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
        $estate = Estate::find($estate);
        return view('estates.show', compact('estate'));
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
        return view('estates.edit', compact('estate'));
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
        Estate::find($estate)->delete();
        return redirect()->route('estates.index')
                        ->with('success', 'Item deleted successfully');
    }
}
