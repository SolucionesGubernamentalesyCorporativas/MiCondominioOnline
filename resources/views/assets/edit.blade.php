@extends('layouts.app')

@section('content')
<div class="ui container">
    <div class="row">
        <div class="column">
            <div class="ui clearing blue segment">
                <div style="position: relative; top: 8px;" class="ui left floated header">Editar activo {{ $asset->name }}</div>
                <a class="ui right floated blue button" href="{{ route('assets.index') }}">
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
                            <form class="ui form error" role="form" method="POST" action="{{ route('assets.update', $asset->id) }}">
                                {{ method_field('PUT') }}
                                {{ csrf_field() }}
                                <div class="eight wide field {{ $errors->has('name') ? 'error' : '' }}">
                                    <label>Nombre</label>
                                    <input type="text" name="name" value="{{ $asset->name }}">
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
                            Editar descripción
                        </div>
                        <div class="content field">
                            <form class="ui form error" role="form" method="POST" action="{{ route('assets.update', $asset->id) }}">
                                {{ method_field('PUT') }}
                                {{ csrf_field() }}
                                <div class="eight wide field {{ $errors->has('description') ? 'error' : '' }}">
                                    <label>descripción</label>
                                    <input type="text" name="description" value="{{ $asset->description }}">
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
                            Editar unidad privativa
                        </div>
                        <div class="content field">
                            <form class="ui form error" role="form" method="POST" action="{{ route('assets.update', $asset->id) }}">
                                {{ method_field('PUT') }}
                                {{ csrf_field() }}
                                <div class="eight wide field {{ $errors->has('estate_id') ? 'error' : '' }}">
                                    <label>Unidad privativa</label>
                                    <div class="ui selection dropdown">
                                        <input type="hidden" name="estate_id" value="{{ $asset->estate_id }}">
                                        <i class="dropdown icon"></i>
                                        <div class="default text">Selecciona la unidad privativa a la que se le prestara el activo</div>
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