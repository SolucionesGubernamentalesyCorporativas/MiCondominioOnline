<?php

namespace App\Http\Controllers;

use App\Visitor;
use App\User;
use App\TypeOfVisitor;
use Illuminate\Http\Request;
use App\Http\Requests\StoreVisitor;
use App\Http\Requests\UpdateVisitor;

class VisitorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Visitor::all();
        return view('visitors.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $typeofvisitors = TypeOfVisitor::all();
        return view('visitors.create')->with('users', $users)
                                        ->with('typeofvisitors', $typeofvisitors);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVisitor $request)
    {
        Visitor::create($request->all());
        return redirect()->route('visitors.index')
                        ->with('success', 'Item created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Visitor  $visitor
     * @return \Illuminate\Http\Response
     */
    public function show(Visitor $visitor)
    {
        $visitor = Visitor::find($visitor->id);
        return view('visitors.show')->with('visitor', $visitor);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Visitor  $visitor
     * @return \Illuminate\Http\Response
     */
    public function edit(Visitor $visitor)
    {
        $visitor = Visitor::find($visitor->id);
        $users = User::all();
        $typeofvisitors = TypeOfVisitor::all();
        return view('visitors.edit')->with('visitor', $visitor)
                                    ->with('users', $users)
                                    ->with('typeofvisitors', $typeofvisitors);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Visitor  $visitor
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVisitor $request, Visitor $visitor)
    {
        Visitor::find($visitor->id)->update($request->all());
        return redirect()->route('visitors.index')
                        ->with('success', 'Item updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Visitor  $visitor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Visitor $visitor)
    {
        Visitor::find($visitor->id)->delete();
        return redirect()->route('visitors.index')
                        ->with('success', 'Item deleted successfully');
    }
}
