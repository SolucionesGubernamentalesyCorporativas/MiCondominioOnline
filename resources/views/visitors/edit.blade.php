@extends('layouts.app')

@section('content')
<div class="ui container">
    <div class="row">
        <div class="column">
            <div class="ui clearing blue segment">
                <div style="position: relative; top: 8px;" class="ui left floated header">Editar {{ $visitor->name }}</div>
                <a class="ui right floated blue button" href="{{ route('visitors.index') }}">Atras</a>
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
                                    <input type="text" name="name" placeholder="{{ $visitor->name }}">
                                    @if ($errors->has('name'))
                                        <span class="ui error message">
                                            <strong>{{ $errors->first('name') }}</strong>
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
                            Editar fecha de llegada
                        </div>
                        <div class="content field">
                            <form class="ui form error" role="form" method="POST" action="{{ route('visitors.update', $visitor->id) }}">
                                {{ method_field('PUT') }}
                                {{ csrf_field() }}
                                <div class="eight wide field {{ $errors->has('date_arrival') ? 'error' : '' }}">
                                    <label>Fecha de llegada</label>
                                    <input type="date" name="date_arrival" value="{{ $visitor->date_arrival }}">
                                    @if ($errors->has('date_arrival'))
                                        <span class="ui error message">
                                            <strong>{{ $errors->first('date_arrival') }}</strong>
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
                            Editar usuario al que visita
                        </div>
                        <div class="content field">
                            <form class="ui form error" role="form" method="POST" action="{{ route('visitors.update', $visitor->id) }}">
                                {{ method_field('PUT') }}
                                {{ csrf_field() }}
                                <div class="eight wide field {{ $errors->has('user_id') ? 'error' : '' }}">
                                    <label>Usuario al que visita</label>
                                    <div class="ui selection dropdown">
                                        <input type="hidden" name="user_id" value="{{ $visitor->user_id }}">
                                        <i class="dropdown icon"></i>
                                        <div class="default text">Selecciona un usuario</div>
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
                                    <label>Vehiculo</label>
                                    <div class="field">
                                        <div class="ui toggle checkbox">
                                            <input type="radio" name="vehicle" value="0" checked>
                                            <label>No</label>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <div class="ui toggle checkbox">
                                            <input type="radio" name="vehicle" value="1">
                                            <label>Si</label>
                                        </div>
                                    </div>
                                    @if ($errors->has('vehicle'))
                                        <span class="ui error message">
                                            <strong>{{ $errors->first('vehicle') }}</strong>
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