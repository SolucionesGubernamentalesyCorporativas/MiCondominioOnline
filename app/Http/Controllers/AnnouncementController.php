<?php

namespace App\Http\Controllers;

use App\Announcement;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAnnouncement;
use App\Http\Requests\UpdateAnnouncement;

class AnnouncementController extends Controller
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
        $data = Announcement::paginate(12);
        return view('announcements.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('announcements.create')->with('users', $users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAnnouncement $request)
    {
        $announcement = new Announcement;

        $announcement->title = $request->title;
        $announcement->description = $request->description;

        $user = User::find($request->user_id);
        $announcement->user()->associate($user);

        $announcement->save();

        return redirect()->route('announcements.index')
                        ->with('success', 'Anuncio creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function show(Announcement $announcement)
    {
        $announcement = Announcement::find($announcement->id);
        return view('announcements.show')->with('announcement', $announcement);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function edit(Announcement $announcement)
    {
        $announcement = Announcement::find($announcement->id);
        $users = User::all();
        return view('announcements.edit')->with('announcement', $announcement)
                                        ->with('users', $users);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAnnouncement $request, Announcement $announcement)
    {
        $announcement = Announcement::find($announcement->id);

        switch ($request->area) {
            case 'title':
                $announcement->title = $request->title;
                break;
            
            case 'description':
                $announcement->description = $request->description;
                break;

            case 'user':
                $announcement->user()->dissociate();
                $user = User::find($request->user_id);
                $announcement->user()->associate($user);
                break;

            default:
                return redirect()->route('announcements.index')
                                ->with('error', 'Hubo un problema al actualizar el anuncio, intente de nuevo');
                break;
        }

        $announcement->save();

        return redirect()->route('announcements.index')
                        ->with('success', 'Anuncio actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Announcement $announcement)
    {
        Announcement::find($announcement->id)->delete();
        return redirect()->route('announcements.index')
                        ->with('success', 'Anuncio eliminado satisfactoriamente');
    }
}
