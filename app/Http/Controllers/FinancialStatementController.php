<?php

namespace App\Http\Controllers;

use App\User;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class FinancialStatementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function consult()
    {
        $debt=0;
        foreach(Auth::user()->condos as $condo){
            foreach($condo->estates as $estate){
                foreach($estate->transactions as $transaction){
                    //$debt -= $transaction->ammount;
                    foreach($estate->receipts as $receipt){
                        if($receipt->verified && $receipt->transaction->id == $transaction->id){
                            $debt += $receipt->ammount;
                        }
                    }
                }
            }
        }

        $outcomes = Transaction::doesntHave('estates')->get();
        foreach($outcomes as $out){
            $debt-= $out->ammount;
        }
        //dd($outcomes);
        


        return view('financialstatements.consult')->with('debt', $debt);
    }

    public function pdf()
    {
        $user = User::find(Auth::id());
        $name = sprintf('estado_financiero-%s-%s.pdf', $user->name, $user->lastname);

        $pdf = PDF::loadView('financialstatements.pdf', [
            'user' => $user
        ]);

        return $pdf->download($name);
    }
}
