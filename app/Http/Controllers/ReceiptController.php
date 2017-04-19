<?php

namespace App\Http\Controllers;

use App\Receipt;
use App\Transaction;
use Illuminate\Http\Request;
use App\Http\Requests\StoreReceipt;
use App\Http\Requests\UpdateReceipt;

class ReceiptController extends Controller
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
        if (request()->has('sort')) {
            $data = Receipt::orderBy('date', request('sort'))
                            ->paginate(12)
                            ->appends('sort', request('sort'));
        }
        else
            $data = Receipt::paginate(12);
        return view('receipts.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $transactions = Transaction::all();
        return view('receipts.create')->with('transactions', $transactions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReceipt $request)
    {
        Receipt::create($request->all());
        return redirect()->route('receipts.index')
                        ->with('success', 'Item created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Receipt  $receipt
     * @return \Illuminate\Http\Response
     */
    public function show(Receipt $receipt)
    {
        $receipt = Receipt::find($receipt->id);
        return view('receipts.show')->with('receipt', $receipt);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Receipt  $receipt
     * @return \Illuminate\Http\Response
     */
    public function edit(Receipt $receipt)
    {
        $receipt = Receipt::find($receipt->id);
        $transactions = Transaction::all();
        return view('receipts.edit')->with('receipt', $receipt)
                                    ->with('transactions', $transactions);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Receipt  $receipt
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReceipt $request, Receipt $receipt)
    {
        Receipt::find($receipt->id)->update($request->all());
        return redirect()->route('receipts.index')
                        ->with('success', 'Item updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Receipt  $receipt
     * @return \Illuminate\Http\Response
     */
    public function destroy(Receipt $receipt)
    {
        Receipt::find($receipt->id)->delete();
        return redirect()->route('receipts.index')
                        ->with('success', 'Item deleted successfully');
    }
}
