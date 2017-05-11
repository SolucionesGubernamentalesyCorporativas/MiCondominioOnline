<?php

namespace App\Http\Controllers;

use App\Incidence;
use App\TypeOfIncidence;
use App\Estate;
use App\IncidenceImage;
use App\Http\Requests\StoreIncidence;
use App\Http\Requests\UpdateIncidence;
use Illuminate\Http\Request;
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
        $data = Incidence::paginate(12);
        if (count($data) >= 1) {
            foreach ($data as $row) {
                foreach ($row->incidenceImages as $image) {
                    $urls[$row->id][$image->id] = Storage::url($image->url_of_img);
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
        $estates = Estate::all();
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
        Incidence::create($request->all());

        // $incidence = new Incidence;
        // $incidence->type_of_incidence_id = $request->type_of_incidence_id;
        // $incidence->estate_id = $request->estate_id;
        // $incidence->date = $request->date;
        // $incidence->description = $request->description;
        // $incidence->save();

        if ($request->hasFile('photos')) {
            $incidence = Incidence::latest()->first();

            foreach ($request->photos as $photo) {
                $image = new IncidenceImage;
                $image->incidence()->associate($incidence);
                $image->url_of_img = $photo->store('public/Incidences');
                $image->type_of_img = $photo->getClientMimeType();
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
        $estates = Estate::all();
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
        if ($request->photo != NULL) {
            $image = IncidenceImage::find($request->id_photo);
            Storage::delete($image->url_of_img);
            $image->url_of_img = $request->photo->store('public/incidences');
            $image->type_of_img = $request->photo->getClientMimeType();
            $image->save();
        } else {
            Incidence::find($incidence->id)->update($request->all());
        }
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
        Incidence::find($incidence->id)->delete();
        foreach ($incidence->incidenceImages as $image) {
            IncidenceImage::find($image->id)->delete();
        }
        return redirect()->route('incidences.index')
                        ->with('success', 'Incidencia eliminada satisfactoriamente');
    }
}
