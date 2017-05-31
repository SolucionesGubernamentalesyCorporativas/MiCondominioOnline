<?php

namespace App\Http\Controllers;

use App\Visitor;
use App\Estate;
use App\TypeOfVisitor;
use App\Http\Requests\StoreVisitor;
use App\Http\Requests\UpdateVisitor;
use Illuminate\Http\Request;

class VisitorController extends Controller
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
        $data = Visitor::paginate(12);

        foreach ($data as $row) {
            $dates[] = $row->date_arrival;
        }

        $uniqueDates = array_unique($dates);
        rsort($uniqueDates);

        return view('visitors.index')->with('data', $data)
                                    ->with('uniqueDates', $uniqueDates);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estates = Estate::all();
        $typeofvisitors = TypeOfVisitor::all();

        return view('visitors.create')->with('estates', $estates)
                                        ->with('typeofvisitors', $typeofvisitors);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVisitor $request)
    {
        $visitor = new Visitor;

        $visitor->name = $request->name;
        $visitor->date_arrival = $request->date_arrival;
        $visitor->vehicle = $request->input('vehicle', 0);

        $typeOfVisitor = TypeOfVisitor::find($request->type_of_visitor_id);
        $visitor->typeOfVisitor()->associate($typeOfVisitor);
        $estate = Estate::find($request->estate_id);
        $visitor->estate()->associate($estate);

        $visitor->save();

        return redirect()->route('visitors.index')
                        ->with('success', 'Visitante creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Visitor  $visitor
     * @return \Illuminate\Http\Response
     */
    public function show(Visitor $visitor)
    {
        $visitor = Visitor::find($visitor->id);

        return view('visitors.show')->with('visitor', $visitor);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Visitor  $visitor
     * @return \Illuminate\Http\Response
     */
    public function edit(Visitor $visitor)
    {
        $visitor = Visitor::find($visitor->id);

        $estates = Estate::all();
        $typeofvisitors = TypeOfVisitor::all();

        return view('visitors.edit')->with('visitor', $visitor)
                                    ->with('estates', $estates)
                                    ->with('typeofvisitors', $typeofvisitors);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Visitor  $visitor
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVisitor $request, Visitor $visitor)
    {
        $visitor = Visitor::find($visitor->id);

        switch ($request->area) {
            case 'name':
                $visitor->name = $request->name;
                break;
            
            case 'date_arrival':
                $visitor->date_arrival = $request->date_arrival;
                break;

            case 'vehicle':
                $visitor->vehicle = $request->input('vehicle', 0);
                break;

            case 'typeofvisitor':
                $visitor->typeOfVisitor()->dissociate();
                $typeOfVisitor = TypeOfVisitor::find($request->type_of_visitor_id);
                $visitor->typeOfVisitor()->associate($typeOfVisitor);
                break;

            case 'estate':
                $visitor->estate()->dissociate();
                $estate = Estate::find($request->estate_id);
                $visitor->estate()->associate($estate);
                break;

            default:
                return redirect()->route('visitors.index')
                                ->with('error', 'Hubo un problema al actualizar el visitante, intente de nuevo');
                break;
        }

        $visitor->save();
        
        return redirect()->route('visitors.index')
                        ->with('success', 'Visitante actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Visitor  $visitor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Visitor $visitor)
    {
        Visitor::find($visitor->id)->delete();

        return redirect()->route('visitors.index')
                        ->with('success', 'Visitante eliminado satisfactoriamente');
    }
}
