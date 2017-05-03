@extends('layouts.app')

@section('content')
<div class="ui container">
    <div class="row">
        <div class="column">
            <div class="ui clearing blue segment">
                <div style="position: relative; top: 8px;" class="ui left floated header">Añadir anuncio</div>
                <a class="ui right floated blue button" href="{{ route('announcements.index') }}">
                    <i class="angle left icon"></i>
                    Atras
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="column">
            <div class="ui blue segment">
                <div class="ui centered grid">
                    <div class="ten wide column">
                        <form class="ui form error" role="form" method="POST" action="{{ route('announcements.store') }}">
                            {{ csrf_field() }}
                            <div class="field {{ $errors->has('title') ? 'error' : '' }}">
                                <label>Titulo</label>
                                <input type="text" name="title" value="{{ old('title') }}" placeholder="Descripción pequeña del anuncio">
                                @if ($errors->has('title'))
                                    <span class="ui error message">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="field {{ $errors->has('url_of_content') ? 'error' : '' }}">
                                <label>Dirección web</label>
                                <input type="url" name="url_of_content" value="{{ old('url_of_content') }}" placeholder="Copia y pega la dirección del anuncio">
                                @if ($errors->has('url_of_content'))
                                    <span class="ui error message">
                                        <strong>{{ $errors->first('url_of_content') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="field {{ $errors->has('estate_id') ? 'error' : '' }}">
                                <label>Usuario</label>
                                <div class="ui selection dropdown">
                                    <input type="hidden" name="user_id" value="{{ old('user_id') }}">
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
                            <button class="ui submit blue button" type="submit">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection