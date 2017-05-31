<!-- Main dynamic content of the dashboard -->

@extends('layouts.app')

@section('content')
<div class="ui container">
    <div class="row">
        <div class="column">
            <div class="ui clearing blue segment">
                <div class="ui left floated header">Inicio</div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="column">
            <div class="ui blue segment">
                <div class="ui two column grid">
                    <div class="column">
                        <div class="ui blue segment">
                            <div class="ui header">Tablon de anuncios</div>
                            <div class="ui feed">
                                @foreach ($announcements as $row)
                                    <div class="event">
                                        <div class="content">
                                            <div class="summary">
                                                <a class="user">{{ $row->user->name . ' ' . $row->user->lastname }}</a>
                                                publicó {{ $row->title }}
                                                <div class="date">{{ $row->created_at->diffForHumans() }}</div>
                                            </div>
                                            <div class="extra text">{{ $row->description }}</div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="column">
                        <div class="ui blue segment">
                            <div class="ui header">Acciones rapidas</div>
                            <div class="ui center aligned two column grid">
                                <div class="column">
                                    <a href="{{ url('/home/create/condo') }}" class="ui small button">Crear condominio</a>
                                </div>
                                <div class="column">
                                    <a href="#" class="ui small button">Crear anuncio</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts._message')
</div>
@endsection




