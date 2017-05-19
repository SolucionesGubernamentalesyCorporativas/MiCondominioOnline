@extends('layouts.app')

@section('content')
<div class="ui container">
    <div class="row">
        <div class="column">
            <div class="ui clearing blue segment">
                <div style="position: relative; top: 8px;" class="ui left floated header">Editar {{ $transaction->observations }}</div>
                <a class="ui right floated blue button" href="{{ route('transactions.index') }}">
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
                            Editar observaciones
                        </div>
                        <div class="content field">
                            <form class="ui form error" role="form" method="POST" action="{{ route('transactions.update', $transaction->id) }}">
                                {{ method_field('PUT') }}
                                {{ csrf_field() }}
                                <div class="eight wide field {{ $errors->has('observations') ? 'error' : '' }}">
                                    <label>Observaciones</label>
                                    <input type="text" name="observations" placeholder="{{ $transaction->observations }}">
                                    @if ($errors->has('observations'))
                                        <span class="ui error message">
                                            <strong>{{ $errors->first('observations') }}</strong>
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
                            Editar cantidad
                        </div>
                        <div class="content field">
                            <form class="ui form error" role="form" method="POST" action="{{ route('transactions.update', $transaction->id) }}">
                                {{ method_field('PUT') }}
                                {{ csrf_field() }}
                                <div class="eight wide field {{ $errors->has('ammount') ? 'error' : '' }}">
                                    <label>Cantidad</label>
                                    <input type="text" name="ammount" placeholder="${{ number_format($transaction->ammount, 2) }}">
                                    @if ($errors->has('ammount'))
                                        <span class="ui error message">
                                            <strong>{{ $errors->first('ammount') }}</strong>
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
                            Editar tipo de transacción
                        </div>
                        <div class="content field">
                            <form class="ui form error" role="form" method="POST" action="{{ route('transactions.update', $transaction->id) }}">
                                {{ method_field('PUT') }}
                                {{ csrf_field() }}
                                <div class="eight wide field {{ $errors->has('type_of_transaction_id') ? 'error' : '' }}">
                                    <label>Tipo de transacción</label>
                                    <div class="ui selection dropdown">
                                        <input type="hidden" name="type_of_transaction_id" value="{{ $transaction->type_of_transaction_id }}">
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
                                <button class="ui submit blue small button" type="submit">Guardar</button>
                            </form>
                        </div>
                    </div>
                    <div class="item">
                        <div class="title">
                            <i class="icon dropdown"></i>
                            Editar casas asociadas a la transacción
                        </div>
                        <div class="content field">
                            <form class="ui form error" role="form" method="POST" action="{{ route('transactions.update', $transaction->id) }}">
                                {{ method_field('PUT') }}
                                {{ csrf_field() }}
                                <div class="eight wide field {{ $errors->has('estate_ids') ? 'error' : '' }}">
                                    <label>Casas</label>
                                    <div class="ui multiple selection dropdown">
                                        <input type="hidden" name="estate_ids" value="{{ $ids }}">
                                        <i class="dropdown icon"></i>
                                        <div class="default text">Selecciona las casas asociadas a la transacción</div>
                                        <div class="menu">
                                            @foreach($estates as $estate)
                                                <div class="item" data-value="{{ $estate->id }}">{{ $estate->typeOfEstate->name . ' ' . $estate->number }}</div>
                                            @endforeach
                                        </div>
                                    </div>
                                    @if ($errors->has('estate_ids'))
                                        <span class="ui error message">
                                            <strong>{{ $errors->first('estate_ids') }}</strong>
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