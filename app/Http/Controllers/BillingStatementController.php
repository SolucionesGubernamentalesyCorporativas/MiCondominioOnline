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
        
        return view('billingstatements.consult')->with('user', $user);
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
