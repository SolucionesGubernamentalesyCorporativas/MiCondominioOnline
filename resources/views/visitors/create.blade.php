@extends('layouts.app')

@section('content')
<div class="ui container">
    <div class="row">
        <div class="column">
            <div class="ui clearing blue segment">
                <div style="position: relative; top: 8px;" class="ui left floated header">Añadir visitante</div>
                <a class="ui right floated blue button" href="{{ route('visitors.index') }}">Atras</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="column">
            <div class="ui blue segment">
                <form class="ui form error" role="form" method="POST" action="{{ route('visitors.store') }}">
                    {{ csrf_field() }}
                    <div class="field {{ $errors->has('name') ? 'error' : '' }}">
                        <label>Nombre completo</label>
                        <input type="text" name="name" value="{{ old('name') }}" autofocus>
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
                    <div class="inline field {{ $errors->has('vehicle') ? 'error' : '' }}">
                        <div class="ui toggle checkbox">
                            <input type="checkbox" name="vehicle" tabindex="0" class="hidden" value="1" checked="{{ old('vehicle') ? 'checked' : '' }}">
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
@endsection