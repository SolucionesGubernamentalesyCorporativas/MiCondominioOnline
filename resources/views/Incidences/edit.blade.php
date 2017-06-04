@extends('layouts.app')

@section('content')
<div class="ui container">
    <div class="row">
        <div class="column">
            <div class="ui clearing blue segment">
                <div style="position: relative; top: 8px;" class="ui left floated header">Editar {{ $incidence->id }}</div>
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
                <div class="ui accordion field">
                    <div class="item">
                        <div class="title">
                            <i class="icon dropdown"></i>
                            Editar fecha
                        </div>
                        <div class="content field">
                            <form class="ui form error" role="form" method="POST" action="{{ route('incidences.update', $incidence->id) }}">
                                {{ method_field('PUT') }}
                                {{ csrf_field() }}
                                <div class="eight wide field {{ $errors->has('date') ? 'error' : '' }}">
                                    <label>Fecha</label>
                                    <input type="date" name="date" value="{{ $incidence->date->format('Y-m-d') }}" max="{{ date('Y-m-d') }}">
                                    @if ($errors->has('date'))
                                        <span class="ui error message">
                                            <strong>{{ $errors->first('date') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <input type="hidden" name="area" value="date">
                                <button class="ui submit blue small button" type="submit">Guardar</button>
                            </form>
                        </div>
                    </div>
                    <div class="item">
                        <div class="title">
                            <i class="icon dropdown"></i>
                            Editar descripción
                        </div>
                        <div class="content field">
                            <form class="ui form error" role="form" method="POST" action="{{ route('incidences.update', $incidence->id) }}">
                                {{ method_field('PUT') }}
                                {{ csrf_field() }}
                                <div class="eight wide field {{ $errors->has('description') ? 'error' : '' }}">
                                    <label>Descripción</label>
                                    <textarea rows="2" name="description" value="{{ $incidence->description }}"></textarea>
                                    @if ($errors->has('description'))
                                        <span class="ui error message">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <input type="hidden" name="area" value="description">
                                <button class="ui submit blue small button" type="submit">Guardar</button>
                            </form>
                        </div>
                    </div>
                    <div class="item">
                        <div class="title">
                            <i class="icon dropdown"></i>
                            Cambiar fotos de la incidencia
                        </div>
                        <div class="content field">
                            <form class="ui form error" role="form" method="POST" action="{{ route('incidences.update', $incidence->id) }}" enctype="multipart/form-data">
                                {{ method_field('PUT') }}
                                {{ csrf_field() }}
                                <div class="eight wide field {{ $errors->has('photo') ? 'error' : '' }}">
                                    <label>Sube las fotos pertenecientes a la incidencia (Max. 3)</label>
                                    <input type="file" name="photos[]" multiple>
                                    @if ($errors->has('photos'))
                                        <span class="ui error message">
                                            <strong>{{ $errors->first('photos') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <input type="hidden" name="area" value="photos">
                                <button class="ui submit blue small button" type="submit">Guardar</button>
                            </form>
                        </div>
                    </div>
                    <div class="item">
                        <div class="title">
                            <i class="icon dropdown"></i>
                            Editar tipo de incidencia
                        </div>
                        <div class="content field">
                            <form class="ui form error" role="form" method="POST" action="{{ route('incidences.update', $incidence->id) }}">
                                {{ method_field('PUT') }}
                                {{ csrf_field() }}
                                <div class="eight wide field {{ $errors->has('type_of_incidence_id') ? 'error' : '' }}">
                                    <label>Tipo de incidencia</label>
                                    <div class="ui selection dropdown">
                                        <input type="hidden" name="type_of_incidence_id" value="{{ $incidence->type_of_incidence_id }}">
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
                                <input type="hidden" name="area" value="typeofincidence">
                                <button class="ui submit blue small button" type="submit">Guardar</button>
                            </form>
                        </div>
                    </div>
                    <div class="item">
                        <div class="title">
                            <i class="icon dropdown"></i>
                            Editar unidad privativa
                        </div>
                        <div class="content field">
                            <form class="ui form error" role="form" method="POST" action="{{ route('incidences.update', $incidence->id) }}">
                                {{ method_field('PUT') }}
                                {{ csrf_field() }}
                                <div class="eight wide field {{ $errors->has('estate_id') ? 'error' : '' }}">
                                    <label>Unidad privativa relacionada al incidente</label>
                                    <div class="ui selection dropdown">
                                        <input type="hidden" name="estate_id" value="{{ $incidence->estate_id }}">
                                        <i class="dropdown icon"></i>
                                        <div class="default text">Selecciona una unidad privativa</div>
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
                                <input type="hidden" name="area" value="estate">
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