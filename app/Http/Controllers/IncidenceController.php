<?php

namespace App\Http\Controllers;

use App\Incidence;
use App\TypeOfIncidence;
use App\Estate;
use App\IncidenceImage;
use App\Http\Requests\StoreIncidence;
use App\Http\Requests\UpdateIncidence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class IncidenceController extends Controller
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
            foreach ($condo->estates as $estate) {
                $estateIds[] = $estate->id;
            }
        }

        $data = Incidence::whereIn('estate_id', $estateIds)->paginate(12);

        if (count($data) >= 1) {
            foreach ($data as $row) {
                $i = 0;
                foreach ($row->incidenceImages as $image) {
                    $urls[$row->id][$i] = Storage::url($image->url_of_img);
                    $i++;
                }
            }
        } else {
            $urls = NULL;
        }

        return view('incidences.index')->with('data', $data)
                                        ->with('urls', $urls);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $typeofincidences = TypeOfIncidence::all();
        foreach (Auth::user()->condos as $condo) {
            foreach ($condo->estates as $estate) {
                $estates[] = $estate;
            }
        }

        return view('incidences.create')->with('typeofincidences', $typeofincidences)
                                        ->with('estates', $estates);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreIncidence $request)
    {
        $incidence = new Incidence;

        $incidence->date = $request->date;
        $incidence->description = $request->description;

        $typeOfIncidence = TypeOfIncidence::find($request->type_of_incidence_id);
        $incidence->typeOfIncidence()->associate($typeOfIncidence);
        $estate = Estate::find($request->estate_id);
        $incidence->estate()->associate($estate);

        $incidence->save();

        if ($request->hasFile('photos')) {
            foreach ($request->photos as $photo) {
                $image = new IncidenceImage;

                $image->url_of_img = $photo->store('public/Incidences');
                $image->type_of_img = $photo->getClientMimeType();
                
                $image->incidence()->associate($incidence);

                $image->save();
            }
        }
        
        return redirect()->route('incidences.index')
                        ->with('success', 'Incidencia creada satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Incidence  $incidence
     * @return \Illuminate\Http\Response
     */
    public function show(Incidence $incidence)
    {
        $incidence = Incidence::find($incidence->id);

        foreach ($incidence->incidenceImages as $image) {
            $urls[$image->id] = Storage::url($image->url_of_img);
        }

        return view('incidences.show')->with('incidence', $incidence)
                                    ->with('urls', $urls);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Incidence  $incidence
     * @return \Illuminate\Http\Response
     */
    public function edit(Incidence $incidence)
    {
        $incidence = Incidence::find($incidence->id);

        foreach ($incidence->incidenceImages as $image) {
            $urls[$image->id] = Storage::url($image->url_of_img);
        }

        $typeofincidences = TypeOfIncidence::all();
        foreach (Auth::user()->condos as $condo) {
            foreach ($condo->estates as $estate) {
                $estates[] = $estate;
            }
        }

        return view('incidences.edit')->with('incidence', $incidence)
                                    ->with('typeofincidences', $typeofincidences)
                                    ->with('estates', $estates)
                                    ->with('urls', $urls);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Incidence  $incidence
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateIncidence $request, Incidence $incidence)
    {
        $incidence = Incidence::find($incidence->id);

        switch ($request->area) {
            case 'date':
                $incidence->date = $request->date;
                break;

            case 'description':
                $incidence->description = $request->description;
                break;

            case 'typeofincidence':
                $incidence->typeOfIncidence()->dissociate();
                $typeOfIncidence = TypeOfIncidence::find($request->type_of_incidence_id);
                $incidence->typeOfIncidence()->associate($typeOfIncidence);
                break;

            case 'estate':
                $incidence->estate()->dissociate();
                $estate = Estate::find($request->estate_id);
                $incidence->estate()->associate($estate);
                break;

            case 'photos':
                foreach ($incidence->incidenceImages as $image) {
                    Storage::delete($image->url_of_img);
                    $image->delete();
                }

                foreach ($request->photos as $photo) {
                    $image = new IncidenceImage;

                    $image->url_of_img = $photo->store('public/incidences');
                    $image->type_of_img = $photo->getClientMimeType();

                    $image->incidence()->associate($incidence);

                    $image->save();
                }
                break;
            
            default:
                return redirect()->route('incidences.index')
                                ->with('error', 'Hubo un problema al actualizar la incidencia, intente de nuevo');
                break;
        }

        $incidence->save();

        return redirect()->route('incidences.index')
                        ->with('success', 'Incidencia actualizada satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Incidence  $incidence
     * @return \Illuminate\Http\Response
     */
    public function destroy(Incidence $incidence)
    {
        $incidence = Incidence::find($incidence->id);

        foreach ($incidence->incidenceImages as $image) {
            Storage::delete($image->url_of_img);
            $image->delete();
        }

        $incidence->delete();

        return redirect()->route('incidences.index')
                        ->with('success', 'Incidencia eliminada satisfactoriamente');
    }
}
