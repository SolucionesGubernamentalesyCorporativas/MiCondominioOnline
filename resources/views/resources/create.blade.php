@extends('layouts.app')

@section('content')
<div class="ui container">
    <div class="row">
        <div class="column">
            <div class="ui clearing blue segment">
                <div style="position: relative; top: 8px;" class="ui left floated header">Añadir recurso</div>
                <a class="ui right floated blue button" href="{{ route('resources.index') }}">Atras</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="column">
            <div class="ui blue segment">
                <div class="ui centered grid">
                    <div class="ten wide column">
                        <form class="ui form error" role="form" method="POST" action="{{ route('resources.store') }}">
                            {{ csrf_field() }}
                            <div class="field {{ $errors->has('capacity') ? 'error' : '' }}">
                                <label>Capacidad</label>
                                <input type="text" name="capacity" value="{{ old('capacity') }}" placeholder="Limite de personas">
                                @if ($errors->has('capacity'))
                                    <span class="ui error message">
                                        <strong>{{ $errors->first('capacity') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="field {{ $errors->has('fee') ? 'error' : '' }}">
                                <label>Costo</label>
                                <input type="text" name="fee" value="{{ old('fee') }}" placeholder="Cantidad monetaria">
                                @if ($errors->has('fee'))
                                    <span class="ui error message">
                                        <strong>{{ $errors->first('fee') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="field {{ $errors->has('type_of_resource_id') ? 'error' : '' }}">
                                <label>Tipo de recurso</label>
                                <div class="ui selection dropdown">
                                    <input type="hidden" name="type_of_resource_id" value="{{ old('type_of_resource_id') }}">
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
                            <div class="field {{ $errors->has('user_id') ? 'error' : '' }}">
                                <label>Usuario asociado al recurso</label>
                                <div class="ui selection dropdown">
                                    <input type="hidden" name="user_id" value="{{ old('user_id') }}">
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
                            <button class="ui submit blue button" type="submit">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection