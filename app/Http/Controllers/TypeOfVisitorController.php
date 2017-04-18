<?php

namespace App\Http\Controllers;

use App\TypeOfVisitor;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTypeOfVisitor;
use App\Http\Requests\UpdateTypeOfVisitor;

class TypeOfVisitorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = TypeOfVisitor::paginate(12);
        return view('typeofvisitors.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('typeofvisitors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTypeOfVisitor $request)
    {
        TypeOfVisitor::create($request->all());
        return redirect()->route('typeofvisitors.index')
                        ->with('success', 'Item created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TypeOfVisitor  $typeOfVisitor
     * @return \Illuminate\Http\Response
     */
    public function show(TypeOfVisitor $typeofvisitor)
    {
        $typeofvisitor = TypeOfVisitor::find($typeofvisitor->id);
        return view('typeofvisitors.show')->with('typeofvisitor', $typeofvisitor);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TypeOfVisitor  $typeOfVisitor
     * @return \Illuminate\Http\Response
     */
    public function edit(TypeOfVisitor $typeofvisitor)
    {
        $typeofvisitor = TypeOfVisitor::find($typeofvisitor->id);
        return view('typeofvisitors.edit')->with('typeofvisitor', $typeofvisitor);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TypeOfVisitor  $typeOfVisitor
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTypeOfVisitor $request, TypeOfVisitor $typeofvisitor)
    {
        TypeOfVisitor::find($typeofvisitor->id)->update($request->all());
        return redirect()->route('typeofvisitors.index')
                        ->with('success', 'Item created successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TypeOfVisitor  $typeOfVisitor
     * @return \Illuminate\Http\Response
     */
    public function destroy(TypeOfVisitor $typeofvisitor)
    {
        TypeOfVisitor::find($typeofvisitor->id)->delete();
        return redirect()->route('typeofvisitors.index')
                        ->with('success', 'Item deleted successfully');
    }
}
