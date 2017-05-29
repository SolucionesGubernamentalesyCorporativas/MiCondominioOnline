<?php

namespace App\Http\Controllers;

use App\Asset;
use App\Estate;
use App\Http\Requests\StoreAsset;
use App\Http\Requests\UpdateAsset;
use Illuminate\Http\Request;

class AssetController extends Controller
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
        $data = Asset::paginate(12);
        return view('assets.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estates = Estate::all();
        return view('assets.create')->with('estates', $estates);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAsset $request)
    {
        $asset = new Asset;

        $asset->name = $request->name;
        $asset->description = $request->description;

        $estate = Estate::find($request->estate_id);
        $asset->estate()->associate($estate);

        $asset->save();

        return redirect()->route('assets.index')
                        ->with('success', 'Activo creado satisfactoriamente');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function show(Asset $asset)
    {
        $asset = Asset::find($asset->id);
        return view('assets.show')->with('asset', $asset);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function edit(Asset $asset)
    {
        $asset = Asset::find($asset->id);
        $estates = Estate::all();
        return view('assets.edit')->with('asset', $asset)
                                ->with('estates', $estates);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAsset $request, Asset $asset)
    {
        $asset = Asset::find($asset->id);

        switch ($request->area) {
            case 'name':
                $asset->name = $request->name;
                break;
            
            case 'description':
                $asset->description = $request->description;
                break;

            case 'estate':
                $asset->estate()->dissociate();
                $estate = Estate::find($request->estate_id);
                $asset->estate()->associate($estate);
                break;

            default:
                return redirect()->route('assets.index')
                                ->with('error', 'Hubo un problema al actualizar el activo, intente de nuevo');
                break;
        }

        $asset->save();

        return redirect()->route('assets.index')
                        ->with('success', 'Activo actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asset $asset)
    {
        Asset::find($asset->id)->delete();
        return redirect()->route('assets.index')
                        ->with('success', 'Activo eliminado satisfactoriamente');
    }
}
