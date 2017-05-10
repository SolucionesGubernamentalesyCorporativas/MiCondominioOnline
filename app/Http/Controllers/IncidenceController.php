<?php

namespace App\Http\Controllers;

use App\Incidence;
use App\TypeOfIncidence;
use App\Estate;
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
                $urls[$row->id] = Storage::url($row->url_of_img);
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
        if ($request->hasFile('photo')) {
            Incidence::create([
                'type_of_incidence_id' => $request->type_of_incidence_id,
                'estate_id' => $request->estate_id,
                'date' => $request->date,
                'description' => $request->description,
                'url_of_img' => $request->photo->store('public/incidences'),
                'type_of_img' => $request->photo->getClientMimeType()
            ]);
        } else {
            Incidence::create($request->all());
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
        $url = Storage::url($incidence->url_of_img);
        return view('incidences.show')->with('incidence', $incidence)
                                    ->with('url', $url);
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
        $url = Storage::url($incidence->url_of_img);
        $typeofincidences = TypeOfIncidence::all();
        $estates = Estate::all();
        return view('incidences.edit')->with('incidence', $incidence)
                                    ->with('typeofincidences', $typeofincidences)
                                    ->with('estates', $estates)
                                    ->with('url', $url);
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
            Storage::delete($incidence->url_of_img);
            Incidence::find($incidence->id)->update([
                'url_of_img' => $request->photo->store('public/incidences'),
                'type_of_img' => $request->photo->getClientMimeType()
            ]);
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
        Storage::delete($incidence->url_of_img);
        Incidence::find($incidence->id)->delete();
        return redirect()->route('incidences.index')
                        ->with('success', 'Incidencia eliminada satisfactoriamente');
    }
}
