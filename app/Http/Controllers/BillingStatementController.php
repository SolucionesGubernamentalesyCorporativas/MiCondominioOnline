<?php

namespace App\Http\Controllers;

use App\User;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class BillingStatementController extends Controller
{
    public function consult()
    {
        $user = User::find(Auth::id());
        $debt = 0;
        foreach ($user->estates as $estate) {
            foreach ($estate->transactions as $transaction) {
                if ($transaction->verified == 0 && $transaction->typeOfTransaction->income_outcome == 0) {
                    $debt += $transaction->ammount;
                }
            }
        }
        
        return view('billingstatements.consult')->with('user', $user)
                                                ->with('debt', $debt);
    }

    public function pdf()
    {
        $user = User::find(Auth::id());
        $name = sprintf('estado_de_cuenta-%s-%s.pdf', $user->name, $user->lastname);

        $pdf = PDF::loadView('billingstatements.pdf', [
            'user' => $user
        ]);

        return $pdf->download($name);
    }
}
