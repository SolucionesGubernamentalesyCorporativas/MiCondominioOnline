@extends('layouts.app')
@section('scripts')
<script>
    $('.ui .dropdown').dropdown();
</script>
@endsection

@section('content')
<div class="ui container">
    <div class="row">
        <div class="column">
            <div class="ui clearing blue segment">
                <div style="position: relative; top: 8px;" class="ui left floated header">Añadir unidad privativa</div>
                <a class="ui right floated blue button" href="{{ route('estates.index') }}">
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
                        <form class="ui form error" role="form" method="POST" action="{{ route('estates.store') }}">
                            {{ csrf_field() }}
                            <div class="field {{ $errors->has('condo_id') ? 'error' : '' }}">
                                <label>Condominio</label>
                                <div class="ui selection dropdown">
                                    <input type="hidden" name="condo_id" value="{{ old('condo_id') }}">
                                    <i class="dropdown icon"></i>
                                    <div class="default text">Selecciona el condominio al que pertenece la unidad privativa</div>
                                    <div class="menu">
                                        @foreach($condos as $condo)
                                            <div class="item" data-value="{{ $condo->id }}">{{ $condo->name }}</div>
                                        @endforeach
                                    </div>
                                </div>
                                @if ($errors->has('condo_id'))
                                    <span class="ui error message">
                                        <strong>{{ $errors->first('condo_id') }}</strong>
                                    </span>
                                @endif  
                            </div>
                            <div class="field {{ $errors->has('type_of_estate_id') ? 'error' : '' }}">
                                <label>Tipo de unidad privativa</label>
                                <div class="ui selection dropdown">
                                    <input type="hidden" name="type_of_estate_id" value="{{ old('type_of_estate_id') }}">
                                    <i class="dropdown icon"></i>
                                    <div class="default text">Selecciona el tipo de unidad privativa que corresponde a esta unidad</div>
                                    <div class="menu">
                                        @foreach($typeofestates as $typeofestate)
                                            <div class="item" data-value="{{ $typeofestate->id }}">{{ $typeofestate->name }}</div>
                                        @endforeach
                                    </div>
                                </div>
                                @if ($errors->has('type_of_estate_id'))
                                    <span class="ui error message">
                                        <strong>{{ $errors->first('type_of_estate_id') }}</strong>
                                    </span>
                                @endif  
                            </div>
                            <div class="field {{ $errors->has('number') ? 'error' : '' }}">
                                <label>Numero</label>
                                <input type="text" name="number" value="{{ old('number') }}" placeholder="El numero de la unidad privativa">
                                @if ($errors->has('number'))
                                    <span class="ui error message">
                                        <strong>{{ $errors->first('number') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="field {{ $errors->has('rented') ? 'error' : '' }}">
                                <div class="ui toggle checkbox">
                                    <input type="checkbox" name="rented" tabindex="0" class="hidden" value="1">
                                    <label>Rentado</label>
                                    @if ($errors->has('rented'))
                                        <span class="ui error message">
                                            <strong>{{ $errors->first('rented') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="field {{ $errors->has('number_of_parking_lots') ? 'error' : '' }}">
                                <label>Lugares de estacionamiento</label>
                                <input type="text" name="number_of_parking_lots" value="{{ old('number_of_parking_lots') }}" placeholder="Numero de lugares de estacionamiento">
                                @if ($errors->has('number_of_parking_lots'))
                                    <span class="ui error message">
                                        <strong>{{ $errors->first('number_of_parking_lots') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="field {{ $errors->has('notes') ? 'error' : '' }}">
                                <label>Notas</label>
                                <input type="text" name="notes" value="{{ old('notes') }}" placeholder="Referentes a la unidad privativa">
                                @if ($errors->has('notes'))
                                    <span class="ui error message">
                                        <strong>{{ $errors->first('notes') }}</strong>
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