@extends('layouts.app')

@section('content')
<div class="ui container">
    <div class="row">
        <div class="column">
            <div class="ui clearing blue segment">
                <div style="position: relative; top: 8px;" class="ui left floated header">Añadir recibo</div>
                <a class="ui right floated blue button" href="{{ route('receipts.index') }}">Atras</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="column">
            <div class="ui blue segment">
                <div class="ui centered grid">
                    <div class="ten wide column">
                        <form class="ui form error" role="form" method="POST" action="{{ route('receipts.store') }}">
                            {{ csrf_field() }}
                            <div class="field {{ $errors->has('date') ? 'error' : '' }}">
                                <label>Fecha</label>
                                <input type="date" name="date" value="{{ old('date') }}">
                                @if ($errors->has('date'))
                                    <span class="ui error message">
                                        <strong>{{ $errors->first('date') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="field {{ $errors->has('name_of_img') ? 'error' : '' }}">
                                <label>Nombre de la imagen</label>
                                <input type="text" name="name_of_img" value="{{ old('name_of_img') }}" placeholder="Descripción pequeña">
                                @if ($errors->has('name_of_img'))
                                    <span class="ui error message">
                                        <strong>{{ $errors->first('name_of_img') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="field {{ $errors->has('type_of_img') ? 'error' : '' }}">
                                <label>Tipo de la imagen</label>
                                <input type="text" name="type_of_img" value="{{ old('type_of_img') }}" placeholder="Factura, nota, etc.">
                                @if ($errors->has('type_of_img'))
                                    <span class="ui error message">
                                        <strong>{{ $errors->first('type_of_img') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="field {{ $errors->has('transaction_id') ? 'error' : '' }}">
                                <label>Transacción</label>
                                <div class="ui selection dropdown">
                                    <input type="hidden" name="transaction_id" value="{{ old('transaction_id') }}">
                                    <i class="dropdown icon"></i>
                                    <div class="default text">Selecciona una transacción asociada al recibo</div>
                                    <div class="menu">
                                        @foreach($transactions as $transaction)
                                            <div class="item" data-value="{{ $transaction->id }}">{{ $transaction->observations }}</div>
                                        @endforeach
                                    </div>
                                </div>
                                @if ($errors->has('transaction_id'))
                                    <span class="ui error message">
                                        <strong>{{ $errors->first('transaction_id') }}</strong>
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