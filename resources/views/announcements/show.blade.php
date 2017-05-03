@extends('layouts.app')

@section('content')
<div class="ui container">
    <div class="row">
        <div class="column">
            <div class="ui clearing blue segment">
                <div style="position: relative; top: 8px;" class="ui left floated header">Anuncio {{ $announcement->title }}</div>
                <a href="{{ route('announcements.index') }}" class="ui right floated blue button">
                    <i class="angle left icon"></i>
                    Atras
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="column">
            <div class="ui blue segment">
                <div class="ui relaxed divided list">
                    <div class="item">
                        <div class="content">
                            <div class="header">Titulo</div>
                            <div class="description">{{ $announcement->title }}</div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="content">
                            <div class="header">URL</div>
                            <div class="description">{{ $announcement->url_of_content }}</div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="content">
                            <div class="header">Usuario propietario del anuncio</div>
                            <div class="description">{{ count($announcement->user) == 1 ? $announcement->user->name . ' ' $announcement->user->lastname : 'Ninguno' }}</div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="content">
                            <div class="header">Fecha de creación</div>
                            <div class="description">{{ $announcement->created_at != NULL ? $announcement->created_at->diffForHumans() : 'No registrado' }}</div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="content">
                            <div class="header">Ultima actualización</div>
                            <div class="description">{{ $announcement->updated_at != NULL ? $announcement->updated_at->diffForHumans() : 'El registro no ha sido actualizado' }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection