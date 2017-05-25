<?php

namespace App\Http\Controllers;

use App\Estate;
use App\TypeOfEstate;
use App\Condo;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEstate;
use App\Http\Requests\UpdateEstate;

class EstateController extends Controller
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
        $condos = Condo::all();

        if (request()->has('condo')) {
            $data = Estate::where('condo_id', request('condo'))
            ->paginate(12)
            ->appends('condo', request('condo'));
        } else {
            $data = Estate::paginate(12);
        }
        
        return view('estates.index')->with('data', $data)
                                    ->with('condos', $condos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $typeofestates = TypeOfEstate::all();
        $condos = Condo::all();

        return view('estates.create')->with('typeofestates', $typeofestates)
                                    ->with('condos', $condos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEstate $request)
    {
        $estate = new Estate;

        $estate->number = $request->number;
        $estate->rented = $request->input('rented', 0);
        $estate->number_of_parking_lots = $request->number_of_parking_lots;
        $estate->notes = $request->notes;

        $typeOfEstate = TypeOfEstate::find($request->type_of_estate_id);
        $estate->typeOfEstate()->associate($typeOfEstate);
        $condo = Condo::find($request->condo_id);
        $estate->condo()->associate($condo);

        $estate->save();

        return redirect()->route('estates.index')
                        ->with('success', 'Unidad privativa creada satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Estate  $estate
     * @return \Illuminate\Http\Response
     */
    public function show(Estate $estate)
    {
        $estate = Estate::find($estate->id);
        return view('estates.show')->with('estate', $estate);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Estate  $estate
     * @return \Illuminate\Http\Response
     */
    public function edit(Estate $estate)
    {
        $estate = Estate::find($estate->id);

        $typeofestates = TypeOFEstate::all();
        $condos = Condo::all();

        return view('estates.edit')->with('estate', $estate)
                                    ->with('typeofestates', $typeofestates)
                                    ->with('condos', $condos);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Estate  $estate
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEstate $request, Estate $estate)
    {
        $estate = Estate::find($estate->id);

        switch ($request->area) {
            case 'number':
                if ($request->number != NULL) {
                    $estate->number = $request->number;
                }
                break;
            
            case 'rented':
                if ($request->rented != NULL) {
                    $estate->rented = $request->rented;
                }
                break;

            case 'number_of_parking_lots':
                if ($request->number_of_parking_lots != NULL) {
                    $estate->number_of_parking_lots = $request->number_of_parking_lots;
                }
                break;

            case 'notes':
                if ($request->notes != NULL) {
                    $estate->notes = $request->notes;
                }
                break;

            case 'typeofestate':
                if ($request->type_of_estate_id != NULL) {
                    $estate->typeOfEstate()->dissociate();
                    $typeOfEstate = TypeOfEstate::find($request->type_of_estate_id);
                    $estate->typeOfEstate()->associate($typeOfEstate);
                }
                break;
            
            case 'condo':
                if ($request->condo_id != NULL) {
                    $estate->condo()->dissociate();
                    $condo = Condo::find($request->condo_id);
                    $estate->condo()->associate($condo);
                }
                break;

            default:
                return redirect()->route('estates.index')
                            ->with('error', 'Hubo un problema al actualizar la unidad privativa, intente de nuevo');
                break;
        }

        $estate->save();
        
        return redirect()->route('estates.index')
                        ->with('success', 'Unidad privativa actualizada satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Estate  $estate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estate $estate)
    {
        Estate::find($estate->id)->delete();
        return redirect()->route('estates.index')
                        ->with('success', 'Unidad privativa eliminada satisfactoriamente');
    }
}
