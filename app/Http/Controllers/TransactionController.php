<?php

namespace App\Http\Controllers;

use App\Transaction;
use App\TypeOfTransaction;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTransaction;
use App\Http\Requests\UpdateTransaction;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Transaction::all();
        return view('transactions.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $typeoftransactions = TypeOfTransaction::all();
        return view('transactions.create')->with('typeoftransactions', $typeoftransactions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTransaction $request)
    {
        Transaction::create($request->all());
        return redirect()->route('transactions.index')
                        ->with('success', 'Item created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        $transaction = Transaction::find($transaction->id);
        return view('transactions.show')->with('transaction', $transaction);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        $transaction = Transaction::Find($transaction->id);
        $typeoftransactions = TypeOfTransaction::all();
        return view('transactions.edit')->with('transaction', $transaction)
                                        ->with('typeoftransactions', $typeoftransactions);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTransaction $request, Transaction $transaction)
    {
        Transaction::find($transaction->id)->update($request->all());
        return redirect()->route('transactions.index')
                        ->with('success', 'Item updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        Transaction::find($transaction->id)->delete();
        return redirect()->route('transactions.index')
                        ->with('success', 'Item deleted successfully');
    }
}
