<?php

namespace App\Http\Controllers;

use App\Estate;
use App\Receipt;
use App\ReceiptImage;
use App\Transaction;
use App\Http\Requests\StoreReceipt;
use App\Http\Requests\UpdateReceipt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        foreach (Auth::user()->condos as $condo) {
            foreach ($condo->estates as $estate) {
                $estateIds[] = $estate->id;
            }
        }

        if (request()->has('sort')) {
            $data = Receipt::whereIn('estate_id', $estateIds)->orderBy('date', request('sort'))
                                                                        ->paginate(12)
                                                                        ->appends('sort', request('sort'));
        } elseif (request()->has('verified')) {
            $data = Receipt::whereIn('estate_id', $estateIds)->where('verified', request('verified'))
                                                                        ->paginate(12)
                                                                        ->appends('verified', request('verified'));
        } else {
            $data = Receipt::whereIn('estate_id', $estateIds)->paginate(12);
        }

        if (count($data) >= 1) {
            foreach($data as $row) {
                $urls[$row->id] = Storage::url($row->receiptImage->url_of_img);
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
        foreach (Auth::user()->condos as $condo) {
            foreach ($condo->estates as $estate) {
                $estates[] = $estate;
                foreach ($estate->transactions as $transaction) {
                    $transactions[] = $transaction;
                }
            }
        }

        return view('receipts.create')->with('transactions', $transactions)
                                    ->with('estates', $estates);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReceipt $request)
    {
        $receipt = new Receipt;

        $receipt->date = $request->date;
        $receipt->ammount = $request->ammount;
        $receipt->verified = $request->input('verified', 0);

        $transaction = Transaction::find($request->transaction_id);
        $receipt->transaction()->associate($transaction);

        $estate = Estate::find($request->estate_id);
        $receipt->estate()->associate($estate);

        $receipt->save();
      
        $image = new ReceiptImage;

        $image->url_of_img = $request->photo->store('public/receipts');
        $image->type_of_img = $request->photo->getClientMimeType();
        $image->receipt()->associate($receipt);

        $image->save();

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

        $url = Storage::url($receipt->receiptImage->url_of_img);

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

        $url = Storage::url($receipt->receiptImage->url_of_img);

        foreach (Auth::user()->condos as $condo) {
            foreach ($condo->estates as $estate) {
                $estates[] = $estate;
                foreach ($estate->transactions as $transaction) {
                    $transactions[] = $transaction;
                }
            }
        }

        return view('receipts.edit')->with('receipt', $receipt)
                                    ->with('transactions', $transactions)
                                    ->with('estates', $estates)
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
        $receipt = Receipt::find($receipt->id);

        switch ($request->area) {
            case 'date':
                $receipt->date = $request->date;
                break;

            case 'ammount':
                $receipt->ammount = $request->ammount;
                break;

            case 'verified':
                $receipt->verified = $request->input('verified', 0);
                break;
            
            case 'transaction':
                $receipt->transaction()->dissociate();
                $transaction = Transaction::find($request->transaction_id);
                $receipt->transaction()->associate($transaction);
                break;

            case 'estate':
                $receipt->estate()->dissociate();
                $estate = Estate::find($request->estate_id);
                $receipt->estate()->associate($estate);
                break;

            case 'photo':
                $image = ReceiptImage::find($receipt->receiptImage->id);

                Storage::delete($image->url_of_img);

                $image->url_of_img = $request->photo->store('public/receipts');
                $image->type_of_img = $request->photo->getClientMimeType();

                $image->save();
                break;

            default:
                return redirect()->route('receipts.index')
                                ->with('error', 'Hubo un problema al actualizar el recibo, intente de nuevo');
                break;
        }

        $receipt->save();

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
        $receipt = Receipt::find($receipt->id);
        $image = ReceiptImage::find($receipt->receiptImage->id);

        Storage::delete($receipt->receiptImage->url_of_img);

        $image->delete();
        $receipt->delete();

        return redirect()->route('receipts.index')
                        ->with('success', 'Recibo eliminado satisfactoriamente');
    }
}
