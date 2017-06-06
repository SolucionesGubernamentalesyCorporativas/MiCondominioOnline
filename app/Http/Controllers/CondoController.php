<?php

namespace App\Http\Controllers;

use App\Condo;
use App\Http\Requests\StoreCondo;
use App\Http\Requests\UpdateCondo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CondoController extends Controller
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
        $data = Auth::user()->condos()->paginate(12);

        return view('condos.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('condos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCondo $request)
    {
        $condo = new Condo;

        $condo->name = $request->name;
        $condo->address = $request->address;

        $condo->save();

        return redirect()->route('condos.index')
                        ->with('success', 'Condominio creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Condo  $condo
     * @return \Illuminate\Http\Response
     */
    public function show(Condo $condo)
    {
        $condo = Condo::find($condo->id);

        return view('condos.show')->with('condo', $condo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Condo  $condo
     * @return \Illuminate\Http\Response
     */
    public function edit(Condo $condo)
    {
        $condo = Condo::find($condo->id);

        return view('condos.edit')->with('condo', $condo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Condo  $condo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCondo $request, Condo $condo)
    {
        $condo = Condo::find($condo->id);

        switch ($request->area) {
            case 'name':
                $condo->name = $request->name;
                break;

            case 'address':
                $condo->address = $request->address;
                break;
                
            default:
                return redirect()->route('condos.index')
                                ->with('error', 'Hubo un problema al actualizar el condominio, intente de nuevo');
                break;
        }

        $condo->save();

        return redirect()->route('condos.index')
                        ->with('success', 'Condominio actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Condo  $condo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Condo $condo)
    {
        Condo::find($condo->id)->delete();
        
        return redirect()->route('condos.index')
                        ->with('success', 'Condominio eliminado satisfactoriamente');
    }
}
