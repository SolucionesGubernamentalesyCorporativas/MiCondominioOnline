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
        $user = User::find(Auth::id());

        return view('financialstatements.consult')->with('user', $user);
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
