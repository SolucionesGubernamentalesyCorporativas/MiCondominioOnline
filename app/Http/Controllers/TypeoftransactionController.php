<?php

namespace App\Http\Controllers;

use App\TypeOfTransaction;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTypeOfTransaction;
use App\Http\Requests\UpdateTypeOfTransaction;

class TypeOfTransactionController extends Controller
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
        if (request()->has('income_outcome')) {
            $data = TypeOfTransaction::where('income_outcome', request('income_outcome'))
                                        ->paginate(12)
                                        ->appends('income_outcome', request('income_outcome'));
        }
        else
            $data = TypeOfTransaction::paginate(12);
        return view('typeoftransactions.index')->with('data', $data);
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
    public function store(StoreTypeOfTransaction $request)
    {
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
        $typeoftransaction = TypeOfTransaction::find($typeoftransaction->id);
        return view('typeoftransactions.show')->with('typeoftransaction', $typeoftransaction);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TypeOfTransaction  $typeOfTransaction
     * @return \Illuminate\Http\Response
     */
    public function edit(TypeOfTransaction $typeoftransaction)
    {
        $typeoftransaction = TypeOfTransaction::find($typeoftransaction->id);
        return view('typeoftransactions.edit')->with('typeoftransaction' , $typeoftransaction);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TypeOfTransaction  $typeOfTransaction
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTypeOfTransaction $request, TypeOfTransaction $typeoftransaction)
    {
        TypeOfTransaction::find($typeoftransaction->id)->update($request->all());
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
        TypeOfTransaction::find($typeoftransaction->id)->delete();
        return redirect()->route('typeoftransactions.index')
                        ->with('success', 'Item deleted successfully');
    }
}
