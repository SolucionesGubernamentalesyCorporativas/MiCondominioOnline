<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Estate;
use App\Transaction;
use App\Receipt;

class AjaxController extends Controller
{
    //
    public function users(){
        $results = User::all();

        return response()->json($results);
    }
    
    public function estatesCondo(Request $request){
        $results = Auth::user()->estates()->leftJoin('type_of_estates', 'estates.type_of_estate_id', '=', 'type_of_estates.id')
        ->where('condo_id',$request->id)
        ->get(array('estates.id','estates.number', 'type_of_estates.name'));
        //dd($results);
        return response()->json($results);
    }

    public function transactionEstate(Request $request ){
        //dd($request->id);
        $estate = Estate::find($request->id);
        $results = $estate->transactions;
        return response()->json($results);
    }
}
