@extends('layouts.app')

@section('content')
<div class="ui container">
    <div class="row">
        <div class="column">
            <div class="ui clearing blue segment">
                <div style="position: relative; top: 8px;" class="ui left floated header">Editar anuncio {{ $announcement->title }}</div>
                <a class="ui right floated blue button" href="{{ route('announcements.index') }}">Atras</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="column">
            <div class="ui blue segment">
                <div class="ui accordion field">
                    <div class="item">
                        <div class="title">
                            <i class="icon dropdown"></i>
                            Editar titulo
                        </div>
                        <div class="content field">
                            <form class="ui form error" role="form" method="POST" action="{{ route('announcements.update', $announcement->id) }}">
                                {{ method_field('PUT') }}
                                {{ csrf_field() }}
                                <div class="eight wide field {{ $errors->has('title') ? 'error' : '' }}">
                                    <label>Titulo</label>
                                    <input type="text" name="title" placeholder="{{ $announcement->title }}">
                                    @if ($errors->has('title'))
                                        <span class="ui error message">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <button class="ui submit blue small button" type="submit">Guardar</button>
                            </form>
                        </div>
                    </div>
                    <div class="item">
                        <div class="title">
                            <i class="icon dropdown"></i>
                            Editar dirección web
                        </div>
                        <div class="content field">
                            <form class="ui form error" role="form" method="POST" action="{{ route('announcements.update', $announcement->id) }}">
                                {{ method_field('PUT') }}
                                {{ csrf_field() }}
                                <div class="eight wide field {{ $errors->has('url_of_content') ? 'error' : '' }}">
                                    <label>Dirección web</label>
                                    <input type="url" name="url_of_content" placeholder="{{ $announcement->url_of_content }}">
                                    @if ($errors->has('url_of_content'))
                                        <span class="ui error message">
                                            <strong>{{ $errors->first('url_of_content') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <button class="ui submit blue small button" type="submit">Guardar</button>
                            </form>
                        </div>
                    </div>
                    <div class="item">
                        <div class="title">
                            <i class="icon dropdown"></i>
                            Editar usuario
                        </div>
                        <div class="content field">
                            <form class="ui form error" role="form" method="POST" action="{{ route('announcements.update', $announcement->id) }}">
                                {{ method_field('PUT') }}
                                {{ csrf_field() }}
                                <div class="eight wide field {{ $errors->has('user_id') ? 'error' : '' }}">
                                    <label>Usuario propietario del anuncio</label>
                                    <div class="ui selection dropdown">
                                        <input type="hidden" name="user_id" value="{{ $announcement->user_id }}">
                                        <i class="dropdown icon"></i>
                                        <div class="default text">Selecciona al usuario propietario del anuncio</div>
                                        <div class="menu">
                                            @foreach($users as $user)
                                                <div class="item" data-value="{{ $user->id }}">{{ $user->name . ' ' . $user->lastname }}</div>
                                            @endforeach
                                        </div>
                                    </div>
                                    @if ($errors->has('user_id'))
                                        <span class="ui error message">
                                            <strong>{{ $errors->first('user_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <button class="ui submit blue small button" type="submit">Guardar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection