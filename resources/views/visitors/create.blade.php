@extends('layouts.app')

@section('content')
<div class="ui container">
    <div class="row">
        <div class="column">
            <div class="ui clearing blue segment">
                <div style="position: relative; top: 8px;" class="ui left floated header">Añadir visitante</div>
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
                <div class="ui centered grid">
                    <div class="ten wide column">
                        <form class="ui form error" role="form" method="POST" action="{{ route('visitors.store') }}">
                            {{ csrf_field() }}
                            <div class="field {{ $errors->has('name') ? 'error' : '' }}">
                                <label>Nombre</label>
                                <input type="text" name="name" value="{{ old('name') }}" placeholder="Nombre completo del visitante" autofocus>
                                @if ($errors->has('name'))
                                    <span class="ui error message">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="field {{ $errors->has('date_arrival') ? 'error' : '' }}">
                                <label>Fecha de llegada</label>
                                <input type="date" name="date_arrival" value="{{ old('date_arrival') }}">
                                @if ($errors->has('date_arrival'))
                                    <span class="ui error message">
                                        <strong>{{ $errors->first('date_arrival') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="field {{ $errors->has('estate_id') ? 'error' : '' }}">
                                <label>Casa a la que visita</label>
                                <div class="ui selection dropdown">
                                    <input type="hidden" name="estate_id" value="{{ old('estate_id') }}">
                                    <i class="dropdown icon"></i>
                                    <div class="default text">Selecciona una casa</div>
                                    <div class="menu">
                                        @foreach($estates as $estate)
                                            <div class="item" data-value="{{ $estate->id }}">{{ $estate->number }}</div>
                                        @endforeach
                                    </div>
                                </div>
                                @if ($errors->has('estate_id'))
                                    <span class="ui error message">
                                        <strong>{{ $errors->first('estate_id') }}</strong>
                                    </span>
                                @endif  
                            </div>
                            <div class="field {{ $errors->has('type_of_visitor_id') ? 'error' : '' }}">
                                <label>Tipo de visitante</label>
                                <div class="ui selection dropdown">
                                    <input type="hidden" name="type_of_visitor_id">
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
                            <div class="field {{ $errors->has('vehicle') ? 'error' : '' }}">
                                <div class="ui toggle checkbox">
                                    <input type="checkbox" name="vehicle" tabindex="0" class="hidden" value="1">
                                    <label>Vehiculo</label>
                                    @if ($errors->has('vehicle'))
                                        <span class="ui error message">
                                            <strong>{{ $errors->first('vehicle') }}</strong>
                                        </span>
                                    @endif
                                </div>
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