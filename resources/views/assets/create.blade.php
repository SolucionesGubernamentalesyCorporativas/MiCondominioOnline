@extends('layouts.app')

@section('content')
<div class="ui container">
    <div class="row">
        <div class="column">
            <div class="ui clearing blue segment">
                <div style="position: relative; top: 8px;" class="ui left floated header">Añadir activo</div>
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
                <div class="ui centered grid">
                    <div class="ten wide column">
                        <form class="ui form error" role="form" method="POST" action="{{ route('assets.store') }}">
                            {{ csrf_field() }}
                            <div class="field {{ $errors->has('name') ? 'error' : '' }}">
                                <label>Nombre</label>
                                <input type="text" name="name" value="{{ old('name') }}" placeholder="Nombre del activo">
                                @if ($errors->has('name'))
                                    <span class="ui error message">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="field {{ $errors->has('description') ? 'error' : '' }}">
                                <label>Descripción</label>
                                <input type="text" name="description" value="{{ old('description') }}" placeholder="Descripción pequeña del activo">
                                @if ($errors->has('description'))
                                    <span class="ui error message">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="field {{ $errors->has('estate_id') ? 'error' : '' }}">
                                <label>Unidad privativa</label>
                                <div class="ui selection dropdown">
                                    <input type="hidden" name="estate_id" value="{{ old('estate_id') }}">
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
                            <button class="ui submit blue button" type="submit">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection