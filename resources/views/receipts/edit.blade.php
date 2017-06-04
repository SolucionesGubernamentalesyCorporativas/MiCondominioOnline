@extends('layouts.app')

@section('content')
<div class="ui container">
    <div class="row">
        <div class="column">
            <div class="ui clearing blue segment">
                <div style="position: relative; top: 8px;" class="ui left floated header">Editar {{ $receipt->name_of_img }}</div>
                <a class="ui right floated blue button" href="{{ route('receipts.index') }}">
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
                            Editar fecha
                        </div>
                        <div class="content field">
                            <form class="ui form error" role="form" method="POST" action="{{ route('receipts.update', $receipt->id) }}">
                                {{ method_field('PUT') }}
                                {{ csrf_field() }}
                                <div class="eight wide field {{ $errors->has('date') ? 'error' : '' }}">
                                    <label>Fecha</label>
                                    <input type="date" name="date" value="{{ $receipt->date->format('Y-m-d') }}" max="{{ date('Y-m-d') }}">
                                    @if ($errors->has('date'))
                                        <span class="ui error message">
                                            <strong>{{ $errors->first('date') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <input type="hidden" name="area" value="date">
                                <button class="ui submit blue small button" type="submit">Guardar</button>
                            </form>
                        </div>
                    </div>
                    <div class="item">
                        <div class="title">
                            <i class="icon dropdown"></i>
                            Editar monto
                        </div>
                        <div class="content field">
                            <form class="ui form error" role="form" method="POST" action="{{ route('receipts.update', $receipt->id) }}">
                                {{ method_field('PUT') }}
                                {{ csrf_field() }}
                                <div class="eight wide field {{ $errors->has('ammount') ? 'error' : '' }}">
                                    <label>Monto</label>
                                    <input type="text" name="ammount" value="{{ $receipt->ammount }}">
                                    @if ($errors->has('ammount'))
                                        <span class="ui error message">
                                            <strong>{{ $errors->first('ammount') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <input type="hidden" name="area" value="ammount">
                                <button class="ui submit blue small button" type="submit">Guardar</button>
                            </form>
                        </div>
                    </div>
                    <div class="item">
                        <div class="title">
                            <i class="icon dropdown"></i>
                            Cambiar foto del recibo
                        </div>
                        <div class="content field">
                            <div class="header">Foto actual</div>
                            <img src="{{ $url }}" alt="Imagen del recibo" class="ui small image">
                            <form class="ui form error" role="form" method="POST" action="{{ route('receipts.update', $receipt->id) }}" enctype="multipart/form-data">
                                {{ method_field('PUT') }}
                                {{ csrf_field() }}
                                <div class="eight wide field {{ $errors->has('photo') ? 'error' : '' }}">
                                    <label>Sube una nueva foto</label>
                                    <input type="file" name="photo">
                                    @if ($errors->has('photo'))
                                        <span class="ui error message">
                                            <strong>{{ $errors->first('photo') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <input type="hidden" name="area" value="photo">
                                <button class="ui submit blue small button" type="submit">Cambiar</button>
                            </form>
                        </div>
                    </div>
                    <div class="item">
                        <div class="title">
                            <i class="icon dropdown"></i>
                            Editar verificación
                        </div>
                        <div class="content field">
                            <form class="ui form error" role="form" method="POST" action="{{ route('receipts.update', $receipt->id) }}">
                                {{ method_field('PUT') }}
                                {{ csrf_field() }}
                                <div class="inline fields {{ $errors->has('verified') ? 'error' : '' }}">
                                    <label for="verified">¿Recibo verificado por un administrador?</label>
                                    <div class="field">
                                        <div class="ui toggle checkbox">
                                            <input type="checkbox" id="verified" name="verified" value="1">
                                        </div>
                                    </div>
                                    @if ($errors->has('verified'))
                                        <span class="ui error message">
                                            <strong>{{ $errors->first('verified') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <input type="hidden" name="area" value="verified">
                                <button class="ui submit blue small button" type="submit">Guardar</button>
                            </form>
                        </div>
                    </div>
                    <div class="item">
                        <div class="title">
                            <i class="icon dropdown"></i>
                            Editar transacción asociada
                        </div>
                        <div class="content field">
                            <form class="ui form error" role="form" method="POST" action="{{ route('receipts.update', $receipt->id) }}">
                                {{ method_field('PUT') }}
                                {{ csrf_field() }}
                                <div class="eight wide field {{ $errors->has('transaction_id') ? 'error' : '' }}">
                                    <label>Transacción</label>
                                    <div class="ui selection dropdown">
                                        <input type="hidden" name="transaction_id" value="{{ $receipt->transaction_id }}">
                                        <i class="dropdown icon"></i>
                                        <div class="default text">Selecciona una transacción</div>
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
                                <input type="hidden" name="area" value="transaction">
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