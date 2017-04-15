@extends('layouts.app')

@section('content')
<div class="ui container">
    <div class="row">
        <div class="column">
            <div class="ui clearing blue segment">
                <div style="position: relative; top: 8px;" class="ui left floated header">Añadir transacción</div>
                <a class="ui right floated blue button" href="{{ route('transactions.index') }}">Atras</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="column">
            <div class="ui blue segment">
                <div class="ui centered grid">
                    <div class="ten wide column">
                        <form class="ui form error" role="form" method="POST" action="{{ route('transactions.store') }}">
                            {{ csrf_field() }}
                            <div class="field {{ $errors->has('observations') ? 'error' : '' }}">
                                <label>Observaciones</label>
                                <input type="text" name="observations" value="{{ old('observations') }}" placeholder="Describe la transacción" autofocus>
                                @if ($errors->has('observations'))
                                    <span class="ui error message">
                                        <strong>{{ $errors->first('observations') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="field {{ $errors->has('ammount') ? 'error' : '' }}">
                                <label>Cantidad</label>
                                <input type="text" name="ammount" value="{{ old('ammount') }}" placeholder="Cantidad monetaria">
                                @if ($errors->has('ammount'))
                                    <span class="ui error message">
                                        <strong>{{ $errors->first('ammount') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="inline fields {{ $errors->has('verified') ? 'error' : '' }}">
                                <label>Verificada</label>
                                <div class="field">
                                    <div class="ui toggle checkbox">
                                        <input type="checkbox" name="verified" value="1">
                                        <label>Si</label>
                                    </div>
                                </div>
                                @if ($errors->has('verified'))
                                    <span class="ui error message">
                                        <strong>{{ $errors->first('verified') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="field {{ $errors->has('type_of_transaction_id') ? 'error' : '' }}">
                                <label>Tipo de transacción</label>
                                <div class="ui selection dropdown">
                                    <input type="hidden" name="type_of_transaction_id" value="{{ old('type_of_transaction_id') }}">
                                    <i class="dropdown icon"></i>
                                    <div class="default text">Selecciona un tipo de transacción</div>
                                    <div class="menu">
                                        @foreach($typeoftransactions as $typeoftransaction)
                                            <div class="item" data-value="{{ $typeoftransaction->id }}">{{ $typeoftransaction->name }}</div>
                                        @endforeach
                                    </div>
                                </div>
                                @if ($errors->has('type_of_transaction_id'))
                                    <span class="ui error message">
                                        <strong>{{ $errors->first('type_of_transaction_id') }}</strong>
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