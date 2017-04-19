@extends('layouts.app')

@section('content')
<div class="ui container">
    <div class="row">
        <div class="column">
            <div class="ui clearing blue segment">
                <div style="position: relative; top: 8px;" class="ui left floated header">Editar {{ $resource->capacity }}</div>
                <a class="ui right floated blue button" href="{{ route('resources.index') }}">
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
                            Editar capacidad
                        </div>
                        <div class="content field">
                            <form class="ui form error" role="form" method="POST" action="{{ route('resources.update', $resource->id) }}">
                                {{ method_field('PUT') }}
                                {{ csrf_field() }}
                                <div class="eight wide field {{ $errors->has('capacity') ? 'error' : '' }}">
                                    <label>Capacidad</label>
                                    <input type="text" name="capacity" placeholder="{{ $resource->capacity }}">
                                    @if ($errors->has('capacity'))
                                        <span class="ui error message">
                                            <strong>{{ $errors->first('capacity') }}</strong>
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
                            Editar costo
                        </div>
                        <div class="content field">
                            <form class="ui form error" role="form" method="POST" action="{{ route('resources.update', $resource->id) }}">
                                {{ method_field('PUT') }}
                                {{ csrf_field() }}
                                <div class="eight wide field {{ $errors->has('fee') ? 'error' : '' }}">
                                    <label>Costo</label>
                                    <input type="text" name="fee" placeholder="{{ $resource->fee }}">
                                    @if ($errors->has('fee'))
                                        <span class="ui error message">
                                            <strong>{{ $errors->first('fee') }}</strong>
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
                            Editar tipo de recurso
                        </div>
                        <div class="content field">
                            <form class="ui form error" role="form" method="POST" action="{{ route('resources.update', $resource->id) }}">
                                {{ method_field('PUT') }}
                                {{ csrf_field() }}
                                <div class="eight wide field {{ $errors->has('type_of_resource_id') ? 'error' : '' }}">
                                    <label>Tipo de recurso</label>
                                    <div class="ui selection dropdown">
                                        <input type="hidden" name="type_of_resource_id" value="{{ $resource->type_of_resource_id }}">
                                        <i class="dropdown icon"></i>
                                        <div class="default text">Selecciona un tipo de recurso</div>
                                        <div class="menu">
                                            @foreach($typeofresources as $typeofresource)
                                                <div class="item" data-value="{{ $typeofresource->id }}">{{ $typeofresource->name }}</div>
                                            @endforeach
                                        </div>
                                    </div>
                                    @if ($errors->has('type_of_resource_id'))
                                        <span class="ui error message">
                                            <strong>{{ $errors->first('type_of_resource_id') }}</strong>
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
                            <form class="ui form error" role="form" method="POST" action="{{ route('resources.update', $resource->id) }}">
                                {{ method_field('PUT') }}
                                {{ csrf_field() }}
                                <div class="eight wide field {{ $errors->has('user_id') ? 'error' : '' }}">
                                    <label>Usuario</label>
                                    <div class="ui selection dropdown">
                                        <input type="hidden" name="user_id" value="{{ $resource->user_id }}">
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection