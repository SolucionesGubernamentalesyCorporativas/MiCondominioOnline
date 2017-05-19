@extends('layouts.app')

@section('content')
<div class="ui container">
    <div class="row">
        <div class="column">
            <div class="ui clearing blue segment">
                <div style="position: relative; top: 8px;" class="ui left floated header">Añadir incidencia</div>
                <a class="ui right floated blue button" href="{{ route('incidences.index') }}">
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
                        <form class="ui form error" role="form" method="POST" action="{{ route('incidences.store') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="field {{ $errors->has('date') ? 'error' : '' }}">
                                <label>Fecha</label>
                                <input type="date" name="date" value="{{ old('date') }}" max="{{ date('Y-m-d') }}">
                                @if ($errors->has('date'))
                                    <span class="ui error message">
                                        <strong>{{ $errors->first('date') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="field {{ $errors->has('description') ? 'error' : '' }}">
                                <label>Descripción</label>
                                <textarea rows="2" name="description" placeholder="Describe la incidencia">{{ old('description') }}</textarea>
                                @if ($errors->has('description'))
                                    <span class="ui error message">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="field {{ $errors->has('photo') ? 'error' : '' }}">
                                <label>Sube una foto de lo que paso (opcional)</label>
                                <input type="file" name="photo">
                                @if ($errors->has('photo'))
                                    <span class="ui error message">
                                        <strong>{{ $errors->first('photo') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="field {{ $errors->has('type_of_incidence_id') ? 'error' : '' }}">
                                <label>Tipo de incidencia</label>
                                <div class="ui selection dropdown">
                                    <input type="hidden" name="type_of_incidence_id" value="{{ old('type_of_incidence_id') }}">
                                    <i class="dropdown icon"></i>
                                    <div class="default text">Selecciona un tipo de incidencia</div>
                                    <div class="menu">
                                        @foreach($typeofincidences as $typeofincidence)
                                            <div class="item" data-value="{{ $typeofincidence->id }}">{{ $typeofincidence->name }}</div>
                                        @endforeach
                                    </div>
                                </div>
                                @if ($errors->has('type_of_incidence_id'))
                                    <span class="ui error message">
                                        <strong>{{ $errors->first('type_of_incidence_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="field {{ $errors->has('estate_id') ? 'error' : '' }}">
                                <label>Casa asociada al incidente</label>
                                <div class="ui selection dropdown">
                                    <input type="hidden" name="estate_id" value="{{ old('estate_id') }}">
                                    <i class="dropdown icon"></i>
                                    <div class="default text">Selecciona una casa</div>
                                    <div class="menu">
                                        @foreach($estates as $estate)
                                            <div class="item" data-value="{{ $estate->id }}">{{ $estate->typeOfEstate->name . ' ' . $estate->number }}</div>
                                        @endforeach
                                    </div>
                                </div>
                                @if ($errors->has('estate_id'))
                                    <span class="ui error message">
                                        <strong>{{ $errors->first('estate_id') }}</strong>
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