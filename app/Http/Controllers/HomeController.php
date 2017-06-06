<?php

namespace App\Http\Controllers;

use App\Announcement;
use App\Condo;
use App\Estate;
use App\TypeOfEstate;
use App\Http\Requests\StoreFastCondo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //require the user to authenticated in order to access
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        foreach (Auth::user()->condos as $condo) {
            foreach ($condo->users as $user) {
                $userIds[] = $user->id;
            }
        }

        $announcements = Announcement::whereIn('user_id', $userIds)->orderBy('created_at','asc')->get();

        return view('home')->with('announcements', $announcements);
    }

    public function createCondo()
    {
        $data = TypeOfEstate::all();

        foreach ($data as $row) {
            $typesOfEstates[] = $row->name;
        }

        return view('fastactions.createcondo')->with('typesOfEstates', $typesOfEstates);
    }

    public function storeCondo(StoreFastCondo $request)
    {
        $condo = new Condo;

        $condo->name = $request->name;
        $condo->address = $request->address;

        $condo->save();

        $data = TypeOfEstate::all();

        foreach ($data as $row) {
            $typesOfEstates[] = $row->name;
        }

        foreach ($request->request as $key => $value) {
            if (in_array($key, $typesOfEstates)) {
                if ($value != 0) {
                    foreach (range(1, $value) as $num) {
                        $estate = new Estate;

                        $estate->number = $num;
                        $estate->number_of_parking_lots = $request->parking_spots;
                        $estate->notes = NULL;

                        $typeOfEstate = TypeOfEstate::where('name', $key)->first();
                        $estate->typeOfEstate()->associate($typeOfEstate);
                        $estate->condo()->associate($condo);

                        $estate->save();
                    }
                }
            }
        }

        return redirect('/home')->with('success', 'Condominio creado satisfactoriamente');
    }
}
