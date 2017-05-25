<?php

namespace App\Http\Controllers;

use App\Transaction;
use App\TypeOfTransaction;
use App\Estate;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTransaction;
use App\Http\Requests\UpdateTransaction;

class TransactionController extends Controller
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
        if(request()->has('sort')) {
            $data = Transaction::orderBy('ammount', request('sort'))
                                ->paginate(12)
                                ->appends('sort', request('sort'));
        }
        else
            $data = Transaction::paginate(12);
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
        $estates = Estate::all();
        return view('transactions.create')->with('typeoftransactions', $typeoftransactions)
                                        ->with('estates', $estates);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTransaction $request)
    {
        $transaction = new Transaction;
        $transaction->observations = $request->observations;
        $transaction->ammount = $request->ammount;

        $typeOfTransaction = TypeOfTransaction::find($request->type_of_transaction_id);
        $transaction->typeOfTransaction()->associate($typeOfTransaction);

        $transaction->save();

        if ($request->estate_ids != NULL) {
            $ids = explode(",", $request->estate_ids);

            foreach ($ids as $id) {
                $estate = Estate::find($id);
                $transaction->estates()->attach($estate);
            }
        }
        
        $transaction->save();

        return redirect()->route('transactions.index')
                        ->with('success', 'Transacción creada satisfactoriamente');
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
        $estates = Estate::all();

        $ids = NULL;

        foreach ($transaction->estates as $estate) {
            $ids .= strval($estate->id) . ",";
        }

        return view('transactions.edit')->with('transaction', $transaction)
                                        ->with('typeoftransactions', $typeoftransactions)
                                        ->with('estates', $estates)
                                        ->with('ids', $ids);
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
        $transaction = Transaction::find($transaction->id);

        switch ($request->area) {
            case 'observations':
                if ($request->observations != NULL) {
                    $transaction->observations == $request->observations;
                }
                break;

            case 'ammount':
                if ($request->ammount != NULL) {
                    $transaction->ammount == $request->ammount;
                }
                break;
            
            case 'typeoftransaction':
                if ($request->type_of_transaction_id != NULL) {
                    $transaction->typeOfTransaction()->dissociate();
                    $typeOfTransaction = TypeOfTransaction::find($request->type_of_transaction_id);
                    $transaction->typeOfTransaction->associate($typeOfTransaction);
                }
                break;

            case 'estate':
                if ($request->estate_ids != NULL) {
                    $transaction->estates()->detach();
                    $ids = explode(",", $request->estate_ids);

                    foreach ($ids as $id) {
                        $estate = Estate::find($id);
                        $transaction->estates()->attach($estate);
                    }
                } else {
                    $transaction->estates()->detach();
                }
                break;

            default:
                return redirect()->route('transactions.index')
                            ->with('error', 'Hubo un problema para actualizar la transacción, intente de nuevo');
                break;
        }

        $transaction->save();

        return redirect()->route('transactions.index')
                        ->with('success', 'Transacción actualizada satisfactoriamente');
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
                        ->with('success', 'Transacción eliminada satisfactoriamente');
    }
}
