@extends('layouts.app')

@section('content')
<div class="ui container">
    <div class="row">
        <div class="column">
            <div class="ui clearing blue segment">
                <div style="position: relative; top: 8px;" class="ui left floated header">Crear condominio</div>
                <a class="ui right floated blue button" href="{{ url('/home') }}">
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
                        <form class="ui form error" role="form" method="POST" action="{{ url('/home/store/condo') }}">
                            {{ csrf_field() }}
                            <div class="field {{ $errors->has('name') ? 'error' : '' }}">
                                <label>Nombre del condominio</label>
                                <input type="text" name="name" value="{{ old('name') }}" placeholder="El nombre del condominio sin numero exterior">
                                @if ($errors->has('name'))
                                    <span class="ui error message">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="field {{ $errors->has('address') ? 'error' : '' }}">
                                <label>Dirección</label>
                                <input type="text" name="address" value="{{ old('address') }}" placeholder="Dirección del condominio">
                                @if ($errors->has('address'))
                                    <span class="ui error message">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <label>Cantidad de unidades privativas que posee el condominio</label>
                            <div class="fields">
                                @foreach ($typesOfEstates as $typeOfEstate)
                                    <div class="four wide field {{ $errors->has($typeOfEstate) ? 'error' : '' }}">
                                        <label>{{ $typeOfEstate }}</label>
                                        <input type="text" name="{{ $typeOfEstate }}" value="{{ old($typeOfEstate) }}">
                                        @if ($errors->has($typeOfEstate))
                                            <span class="ui error message">
                                                <strong>{{ $errors->first($typeOfEstate) }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                            <div class="field {{ $errors->has('parking_spots') ? 'error' : '' }}">
                                <label>Lugares de estacionamiento de cada unidad privativa</label>
                                <input type="text" name="parking_spots" value="{{ old('parking_spots') }}" placeholder="Digite la cantidad de lugares de estacionamiento">
                                @if ($errors->has('parking_spots'))
                                    <span class="ui error message">
                                        <strong>{{ $errors->first('parking_spots') }}</strong>
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