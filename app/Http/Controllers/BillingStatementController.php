<?php

namespace App\Http\Controllers;

use App\User;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use PDF;

class BillingStatementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function consult()
    {
        $user = Auth::user();
        $debt = 0;
        $urls = NULL;

        //dd($user->estates[0]->transactions);
        
        foreach ($user->estates as $estate) {
            foreach ($estate->transactions as $transaction){
                if ($transaction->typeOfTransaction->income_outcome == 0) {
                    $debt -= $transaction->ammount;
                }
                foreach($transaction->receipt as $receipt){
                    if($receipt->verified && $receipt->estate_id == $estate->id){
                        $debt+= $receipt->ammount;
                    }
                }
            }
        }
        //dd($user);
        
        return view('billingstatements.consult')->with('user', $user)
                                                ->with('debt', $debt)
                                                ->with('urls', $urls);
    }

    public function pdf()
    {
        $user = User::find(Auth::id());

        $debt = NULL;

        foreach ($user->estates as $estate) {
            foreach ($estate->transactions as $transaction){
                if ($transaction->typeOfTransaction->income_outcome == 0) {
                    $debt += $transaction->ammount;
                    if (count($transaction->receipt) >= 1) {
                        foreach ($transaction->receipt as $receipt) {
                            if ($receipt->verified == 1) {
                                $debt -= $receipt->ammount;
                            }
                        }
                    }
                }
            }
        }

        $name = sprintf('estado_de_cuenta-%s-%s.pdf', $user->name, $user->lastname);

        $pdf = PDF::loadView('billingstatements.pdf', [
            'user' => $user,
            'debt' => $debt
        ]);

        return $pdf->download($name);
    }
}
