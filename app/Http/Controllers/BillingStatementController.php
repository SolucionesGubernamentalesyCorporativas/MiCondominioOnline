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
    public function consult()
    {
        $user = Auth::user();
        $debt = 0;
        foreach ($user->estates as $estate) {
            foreach ($estate->transactions as $transaction){
                if ($transaction->typeOfTransaction->income_outcome == 0) {
                    if (count($transaction->receipt) != 0 && $transaction->receipt->verified == 0) {
                        $debt += $transaction->ammount;
                    }
                }
                $urls[$transaction->receipt->id] = Storage::url($transaction->receipt->url_of_img);
            }
        }
        
        return view('billingstatements.consult')->with('user', $user)
                                                ->with('debt', $debt)
                                                ->with('urls', $urls);
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
