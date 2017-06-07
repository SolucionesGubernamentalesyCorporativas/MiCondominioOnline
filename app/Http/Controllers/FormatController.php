<?php

namespace App\Http\Controllers;

use App\Format;
use App\TypeOfFormat;
use App\Condo;
use App\Http\Requests\StoreFormat;
use App\Http\Requests\UpdateFormat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FormatController extends Controller
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
        foreach (Auth::user()->condos as $condo) {
            $condoIds[] = $condo->id;
        }

        $data = Format::whereIn('condo_id', $condoIds)->paginate(12);

        return view('formats.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $typeOfFormats = TypeOfFormat::all();
        $condos = Auth::user()->condos;

        return view('formats.create')->with('typeOfFormats', $typeOfFormats)
                                    ->with('condos', $condos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFormat $request)
    {
        $format = new Format;

        $format->name = $request->name;
        $format->content = $request->format;

        $typeOfFormat = TypeOfFormat::find($request->type_of_format_id);
        $format->typeOfFormat()->associate($typeOfFormat);
        $condo = Condo::find($request->condo_id);
        $format->condo()->associate($condo);

        $format->save();

        return redirect()->route('formats.index')
                        ->with('success', 'Formato creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Format  $format
     * @return \Illuminate\Http\Response
     */
    public function show(Format $format)
    {
        $format = Format::find($format->id);

        return view('formats.show')->with('format', $format);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Format  $format
     * @return \Illuminate\Http\Response
     */
    public function edit(Format $format)
    {
        $format = Format::find($format->id);

        $typeOfFormats = TypeOfFormat::all();
        $condos = Auth::user()->condos;

        return view('formats.edit')->with('format', $format)
                                    ->with('typeOfFormats', $typeOfFormats)
                                    ->with('condos', $condos);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Format  $format
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFormat $request, Format $format)
    {
        $format = Format::find($format->id);

        switch ($request->area) {
            case 'name':
                $format->name = $request->name;
                break;
            
            case 'format':
                $format->content = $request->format;
                break;

            case 'typeofformat':
                $format->typeOfFormat()->dissociate();
                $typeOfFormat = TypeOfFormat::find($request->type_of_format_id);
                $format->typeOfFormat()->associate($typeOfFormat);
                break;

            case 'condo':
                $format->condo()->dissociate();
                $condo = Condo::find($request->condo_id);
                $format->condo()->associate($condo);
                break;

            default:
                return redirect()->route('formats.index')
                                ->with('error', 'Hubo un problema al actualizar el formato, intente de nuevo');
                break;
        }

        $format->save();

        return redirect()->route('formats.index')
                        ->with('success', 'Formato actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Format  $format
     * @return \Illuminate\Http\Response
     */
    public function destroy(Format $format)
    {
        $format = Format::find($format->id);

        $format->delete();

        return redirect()->route('formats.index')
                        ->with('success', 'Formato eliminado satisfactoriamente');
    }
}
