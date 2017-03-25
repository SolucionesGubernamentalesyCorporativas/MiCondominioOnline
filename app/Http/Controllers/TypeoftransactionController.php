<?php

namespace App\Http\Controllers;

use App\TypeOfTransaction;
use Illuminate\Http\Request;

class TypeOfTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = TypeOfTransaction::all();
        return view('typeoftransactions.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('typeoftransactions.create');
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
            'name' => 'required'
        ]);

        TypeOfTransaction::create($request->all());
        return redirect()->route('typeoftransactions.index')
                            ->with('success', 'Item created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TypeOfTransaction  $typeOfTransaction
     * @return \Illuminate\Http\Response
     */
    public function show(TypeOfTransaction $typeoftransaction)
    {
        $typeoftransaction = TypeOfTransaction::find($typeoftransaction);
        return view('typeoftransactions.show', compact('typeoftransaction'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TypeOfTransaction  $typeOfTransaction
     * @return \Illuminate\Http\Response
     */
    public function edit(TypeOfTransaction $typeoftransaction)
    {
        $typeoftransaction = TypeOfTransaction::find($typeoftransaction);
        return view('typeoftransactions.edit', compact('typeoftransaction'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TypeOfTransaction  $typeOfTransaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TypeOfTransaction $typeoftransaction)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        TypeOfTransaction::find($typeoftransaction)->update($request->all());
        return redirect()->route('typeoftransactions.index')
                            ->with('success', 'Item created successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TypeOfTransaction  $typeOfTransaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(TypeOfTransaction $typeoftransaction)
    {
        TypeOfTransaction::find($typeoftransaction)->delete();
        return redirect()->route('typeoftransactions.index')
                        ->with('success', 'Item deleted successfully');
    }
}
