@extends('layouts.app')

@section('content')
<div class="ui container">
    <div class="row">
        <div class="column">
            <div class="ui clearing blue segment">
                <div style="position: relative; top: 8px;" class="ui left floated header">Editar unidad privativa {{ $estate->typeOfEstate->name . ' ' . $estate->number }}</div>
                <a class="ui right floated blue button" href="{{ route('estates.index') }}">
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
                            Editar numero
                        </div>
                        <div class="content field">
                            <form class="ui form error" role="form" method="POST" action="{{ route('estates.update', $estate->id) }}">
                                {{ method_field('PUT') }}
                                {{ csrf_field() }}
                                <div class="eight wide field {{ $errors->has('number') ? 'error' : '' }}">
                                    <label>Numero</label>
                                    <input type="text" name="number" placeholder="{{ $estate->number }}">
                                    @if ($errors->has('number'))
                                        <span class="ui error message">
                                            <strong>{{ $errors->first('number') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <input type="hidden" name="area" value="number">
                                <button class="ui submit blue small button" type="submit">Guardar</button>
                            </form>
                        </div>
                    </div>
                    <div class="item">
                        <div class="title">
                            <i class="icon dropdown"></i>
                            Editar disponibilidad
                        </div>
                        <div class="content field">
                            <form class="ui form error" role="form" method="POST" action="{{ route('estates.update', $estate->id) }}">
                                {{ method_field('PUT') }}
                                {{ csrf_field() }}
                                <div class="inline fields {{ $errors->has('rented') ? 'error' : '' }}">
                                    <label>Rentado</label>
                                    <div class="field">
                                        <div class="ui toggle checkbox">
                                            <input type="radio" name="rented" value="0" checked>
                                            <label>No</label>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <div class="ui toggle checkbox">
                                            <input type="radio" name="rented" value="1">
                                            <label>Si</label>
                                        </div>
                                    </div>
                                    @if ($errors->has('rented'))
                                        <span class="ui error message">
                                            <strong>{{ $errors->first('rented') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <input type="hidden" name="area" value="rented">
                                <button class="ui submit blue small button" type="submit">Guardar</button>
                            </form>
                        </div>
                    </div>
                    <div class="item">
                        <div class="title">
                            <i class="icon dropdown"></i>
                            Editar lugares de estacionamiento
                        </div>
                        <div class="content field">
                            <form class="ui form error" role="form" method="POST" action="{{ route('estates.update', $estate->id) }}">
                                {{ method_field('PUT') }}
                                {{ csrf_field() }}
                                <div class="eight wide field {{ $errors->has('number_of_parking_lots') ? 'error' : '' }}">
                                    <label>Numero de lugares de estacionamiento</label>
                                    <input type="text" name="number_of_parking_lots" placeholder="{{ $estate->number_of_parking_lots }}">
                                    @if ($errors->has('number_of_parking_lots'))
                                        <span class="ui error message">
                                            <strong>{{ $errors->first('number_of_parking_lots') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <input type="hidden" name="area" value="number_of_parking_lots">
                                <button class="ui submit blue small button" type="submit">Guardar</button>
                            </form>
                        </div>
                    </div>
                    <div class="item">
                        <div class="title">
                            <i class="icon dropdown"></i>
                            Editar notas
                        </div>
                        <div class="content field">
                            <form class="ui form error" role="form" method="POST" action="{{ route('estates.update', $estate->id) }}">
                                {{ method_field('PUT') }}
                                {{ csrf_field() }}
                                <div class="eight wide field {{ $errors->has('notes') ? 'error' : '' }}">
                                    <label>Notas</label>
                                    <input type="text" name="notes" placeholder="{{ $estate->notes }}">
                                    @if ($errors->has('notes'))
                                        <span class="ui error message">
                                            <strong>{{ $errors->first('notes') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <input type="hidden" name="area" value="notes">
                                <button class="ui submit blue small button" type="submit">Guardar</button>
                            </form>
                        </div>
                    </div>
                    <div class="item">
                        <div class="title">
                            <i class="icon dropdown"></i>
                            Editar tipo de unidad privativa
                        </div>
                        <div class="content field">
                            <form class="ui form error" role="form" method="POST" action="{{ route('estates.update', $estate->id) }}">
                                {{ method_field('PUT') }}
                                {{ csrf_field() }}
                                <div class="eight wide field {{ $errors->has('type_of_estate_id') ? 'error' : '' }}">
                                    <label>Tipo de unidad privativa</label>
                                    <div class="ui selection dropdown">
                                        <input type="hidden" name="type_of_estate_id" value="{{ $estate->type_of_estate_id }}">
                                        <i class="dropdown icon"></i>
                                        <div class="default text">Selecciona un tipo de unidad privativa</div>
                                        <div class="menu">
                                            @foreach($typeofestates as $typeofestate)
                                                <div class="item" data-value="{{ $typeofestate->id }}">{{ $typeofestate->name }}</div>
                                            @endforeach
                                        </div>
                                    </div>
                                    @if ($errors->has('type_of_estate_id'))
                                        <span class="ui error message">
                                            <strong>{{ $errors->first('type_of_estate_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <input type="hidden" name="area" value="typeofestate">
                                <button class="ui submit blue small button" type="submit">Guardar</button>
                            </form>
                        </div>
                    </div>
                    <div class="item">
                        <div class="title">
                            <i class="icon dropdown"></i>
                            Editar condominio
                        </div>
                        <div class="content field">
                            <form class="ui form error" role="form" method="POST" action="{{ route('estates.update', $estate->id) }}">
                                {{ method_field('PUT') }}
                                {{ csrf_field() }}
                                <div class="eight wide field {{ $errors->has('condo_id') ? 'error' : '' }}">
                                    <label>Condominio asociado a la unidad privativa</label>
                                    <div class="ui selection dropdown">
                                        <input type="hidden" name="condo_id" value="{{ $estate->condo->id }}">
                                        <i class="dropdown icon"></i>
                                        <div class="default text">Selecciona el condominio asociado</div>
                                        <div class="menu">
                                            @foreach($condos as $condo)
                                                <div class="item" data-value="{{ $condo->id }}">{{ $condo->name }}</div>
                                            @endforeach
                                        </div>
                                    </div>
                                    @if ($errors->has('condo_id'))
                                        <span class="ui error message">
                                            <strong>{{ $errors->first('condo_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <input type="hidden" name="area" value="condo">
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