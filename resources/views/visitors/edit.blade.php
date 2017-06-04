@extends('layouts.app')

@section('content')
<div class="ui container">
    <div class="row">
        <div class="column">
            <div class="ui clearing blue segment">
                <div style="position: relative; top: 8px;" class="ui left floated header">Editar {{ $visitor->name }}</div>
                <a class="ui right floated blue button" href="{{ route('visitors.index') }}">
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
                            Editar nombre
                        </div>
                        <div class="content field">
                            <form class="ui form error" role="form" method="POST" action="{{ route('visitors.update', $visitor->id) }}">
                                {{ method_field('PUT') }}
                                {{ csrf_field() }}
                                <div class="eight wide field {{ $errors->has('name') ? 'error' : '' }}">
                                    <label>Nombre</label>
                                    <input type="text" name="name" value="{{ $visitor->name }}">
                                    @if ($errors->has('name'))
                                        <span class="ui error message">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <input type="hidden" name="area" value="name">
                                <button class="ui submit blue small button" type="submit">Guardar</button>
                            </form>
                        </div>
                    </div>
                    <div class="item">
                        <div class="title">
                            <i class="icon dropdown"></i>
                            Editar fecha de llegada
                        </div>
                        <div class="content field">
                            <form class="ui form error" role="form" method="POST" action="{{ route('visitors.update', $visitor->id) }}">
                                {{ method_field('PUT') }}
                                {{ csrf_field() }}
                                <div class="eight wide field {{ $errors->has('date_arrival') ? 'error' : '' }}">
                                    <label>Fecha de llegada</label>
                                    <input type="date" name="date_arrival" value="{{ $visitor->date_arrival->format('Y-m-d') }}" min="{{ date('Y-m-d') }}">
                                    @if ($errors->has('date_arrival'))
                                        <span class="ui error message">
                                            <strong>{{ $errors->first('date_arrival') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <input type="hidden" name="area" value="date_arrival">
                                <button class="ui submit blue small button" type="submit">Guardar</button>
                            </form>
                        </div>
                    </div>
                    <div class="item">
                        <div class="title">
                            <i class="icon dropdown"></i>
                            Editar unidad privativa a la que visita
                        </div>
                        <div class="content field">
                            <form class="ui form error" role="form" method="POST" action="{{ route('visitors.update', $visitor->id) }}">
                                {{ method_field('PUT') }}
                                {{ csrf_field() }}
                                <div class="eight wide field {{ $errors->has('estate_id') ? 'error' : '' }}">
                                    <label>Unidad privativa</label>
                                    <div class="ui selection dropdown">
                                        <input type="hidden" name="estate_id" value="{{ $visitor->estate_id }}">
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
                    <div class="item">
                        <div class="title">
                            <i class="icon dropdown"></i>
                            Editar tipo de visitante
                        </div>
                        <div class="content field">
                            <form class="ui form error" role="form" method="POST" action="{{ route('visitors.update', $visitor->id) }}">
                                {{ method_field('PUT') }}
                                {{ csrf_field() }}
                                <div class="eight wide field {{ $errors->has('type_of_visitor_id') ? 'error' : '' }}">
                                    <label>Tipo de visitante</label>
                                    <div class="ui selection dropdown">
                                        <input type="hidden" name="type_of_visitor_id" value="{{ $visitor->type_of_visitor_id }}">
                                        <i class="dropdown icon"></i>
                                        <div class="default text">Selecciona un tipo de visitante</div>
                                        <div class="menu">
                                            @foreach($typeofvisitors as $typeofvisitor)
                                                <div class="item" data-value="{{ $typeofvisitor->id }}">{{ $typeofvisitor->name }}</div>
                                            @endforeach
                                        </div>
                                    </div>
                                    @if ($errors->has('type_of_visitor_id'))
                                        <span class="ui error message">
                                            <strong>{{ $errors->first('type_of_visitor_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <input type="hidden" name="area" value="typeofvisitor">
                                <button class="ui submit blue small button" type="submit">Guardar</button>
                            </form>
                        </div>
                    </div>
                    <div class="item">
                        <div class="title">
                            <i class="icon dropdown"></i>
                            Editar vehiculo
                        </div>
                        <div class="content field">
                            <form class="ui form error" role="form" method="POST" action="{{ route('visitors.update', $visitor->id) }}">
                                {{ method_field('PUT') }}
                                {{ csrf_field() }}
                                <div class="inline fields {{ $errors->has('vehicle') ? 'error' : '' }}">
                                    <label for="vehicle">Vehiculo</label>
                                    <div class="field">
                                        <div class="ui toggle checkbox">
                                            <input type="checkbox" id="vehicle" name="vehicle" value="1">
                                        </div>
                                    </div>
                                    @if ($errors->has('vehicle'))
                                        <span class="ui error message">
                                            <strong>{{ $errors->first('vehicle') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <input type="hidden" name="area" value="vehicle">
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