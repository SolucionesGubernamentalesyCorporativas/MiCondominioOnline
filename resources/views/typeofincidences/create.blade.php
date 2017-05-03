@extends('layouts.app')

@section('content')
<div class="ui container">
    <div class="row">
        <div class="column">
            <div class="ui clearing blue segment">
                <div style="position: relative; top: 8px;" class="ui left floated header">Añadir tipo de incidencia</div>
                <a class="ui right floated blue button" href="{{ route('typeofincidences.index') }}">
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
                        <form class="ui form error" role="form" method="POST" action="{{ route('typeofincidences.store') }}">
                            {{ csrf_field() }}
                                <div class="field {{ $errors->has('name') ? 'error' : '' }}">
                                <label>Nombre</label>
                                <input type="text" name="name" value="{{ old('name') }}" placeholder="Nombre de la incidencia" autofocus>
                                @if ($errors->has('name'))
                                    <span class="ui error message">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="field {{ $errors->has('description') ? 'error' : '' }}">
                                <label>Descripción</label>
                                <input type="text" name="description" value="{{ old('description') }}" placeholder="Describe la incidencia">
                                @if ($errors->has('description'))
                                    <span class="ui error message">
                                        <strong>{{ $errors->first('description') }}</strong>
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