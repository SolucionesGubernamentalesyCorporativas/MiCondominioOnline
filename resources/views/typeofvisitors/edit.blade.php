@extends('layouts.app')

@section('content')
<div class="ui container">
    <div class="row">
        <div class="column">
            <div class="ui clearing blue segment">
                <div style="position: relative; top: 8px;" class="ui left floated header">Editar {{ $typeofvisitor->name }}</div>
                <a class="ui right floated blue button" href="{{ route('typeofvisitors.index') }}">Atras</a>
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
                            <form class="ui form error" role="form" method="POST" action="{{ route('typeofvisitors.update', $typeofvisitor->id) }}">
                                {{ method_field('PUT') }}
                                {{ csrf_field() }}
                                <div class="field {{ $errors->has('name') ? 'error' : '' }}">
                                    <label>Nombre</label>
                                    <input type="text" name="name" placeholder="{{ $typeofvisitor->name }}">
                                    @if ($errors->has('name'))
                                        <span class="ui error message">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <button class="ui submit blue button" type="submit">Guardar</button>
                            </form>
                        </div>
                    </div>
                    <div class="item">
                        <div class="title">
                            <i class="icon dropdown"></i>
                            Editar descripción
                        </div>
                        <div class="content field">
                            <form class="ui form error" role="form" method="POST" action="{{ route('typeofvisitors.update', $typeofvisitor->id) }}">
                                {{ method_field('PUT') }}
                                {{ csrf_field() }}
                                <div class="field {{ $errors->has('description') ? 'error' : '' }}">
                                    <label>Descripción</label>
                                    <input type="text" name="description" placeholder="{{ $typeofvisitor->description }}">
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
                    <div class="item">
                        <div class="title">
                            <i class="icon dropdown"></i>
                            Editar visitante
                        </div>
                        <div class="content field">
                            <form class="ui form error" role="form" method="POST" action="{{ route('typeofvisitors.update', $typeofvisitor->id) }}">
                                {{ method_field('PUT') }}
                                {{ csrf_field() }}
                                <div class="eight wide field {{ $errors->has('visitor_id') ? 'error' : '' }}">
                                    <label>Visitante</label>
                                    <div class="ui selection dropdown">
                                        <input type="hidden" name="visitor_id" value="{{ $typeofvisitor->visitor_id }}">
                                        <i class="dropdown icon"></i>
                                        <div class="default text">Selecciona un visitante</div>
                                        <div class="menu">
                                            @foreach($visitors as $visitor)
                                                <div class="item" data-value="{{ $visitor->id }}">{{ $visitor->name }}</div>
                                            @endforeach
                                        </div>
                                    </div>
                                    @if ($errors->has('visitor_id'))
                                        <span class="ui error message">
                                            <strong>{{ $errors->first('visitor_id') }}</strong>
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