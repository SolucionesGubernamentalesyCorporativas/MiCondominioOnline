<?php

namespace App\Http\Controllers;

use App\Receipt;
use App\Transaction;
use App\Http\Requests\StoreReceipt;
use App\Http\Requests\UpdateReceipt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReceiptController extends Controller
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
        if (request()->has('sort')) {
            $data = Receipt::orderBy('date', request('sort'))
                            ->paginate(12)
                            ->appends('sort', request('sort'));
        } else {
            $data = Receipt::paginate(12);
        }
        if (count($data) >= 1) {
            foreach($data as $row) {
                $urls[$row->id] = Storage::url($row->url_of_img);
            }
        } else {
            $urls = NULL;
        }
        return view('receipts.index')->with('data', $data)
                                    ->with('urls', $urls);
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
        Receipt::create([
            'date' => $request->date,
            'url_of_img' => $request->photo->store('public/receipts'),
            'type_of_img' => $request->photo->getClientMimeType(),
            'transaction_id' => $request->transaction_id
        ]);
        return redirect()->route('receipts.index')
                        ->with('success', 'Recibo creado satisfactoriamente');
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
        $url = Storage::url($receipt->url_of_img);
        return view('receipts.show')->with('receipt', $receipt)
                                    ->with('url', $url);
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
        $url = Storage::url($receipt->url_of_img);
        $transactions = Transaction::all();
        return view('receipts.edit')->with('receipt', $receipt)
                                    ->with('transactions', $transactions)
                                    ->with('url', $url);
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
        if($request->photo != NULL) {
            Storage::delete($receipt->url_of_img);
            Receipt::find($receipt->id)->update([
                'url_of_img' => $request->photo->store('public/receipts'),
                'type_of_img' => $request->photo->getClientMimeType()
            ]);
        } else {
            Receipt::find($receipt->id)->update($request->all());
        }
        return redirect()->route('receipts.index')
                        ->with('success', 'Recibo actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Receipt  $receipt
     * @return \Illuminate\Http\Response
     */
    public function destroy(Receipt $receipt)
    {
        Storage::delete($receipt->url_of_img);
        Receipt::find($receipt->id)->delete();
        return redirect()->route('receipts.index')
                        ->with('success', 'Recibo eliminado satisfactoriamente');
    }
}
