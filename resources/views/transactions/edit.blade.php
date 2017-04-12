@extends('layouts.app')

@section('content')
<div class="ui container">
    <div class="row">
        <div class="column">
            <div class="ui clearing blue segment">
                <div style="position: relative; top: 8px;" class="ui left floated header">Editar {{ $transaction->observations }}</div>
                <a class="ui right floated blue button" href="{{ route('transactions.index') }}">Atras</a>
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
                                    <input type="text" name="ammount" placeholder="{{ $transaction->ammount }}">
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
                            Editar verificación
                        </div>
                        <div class="content field">
                            <form class="ui form error" role="form" method="POST" action="{{ route('transactions.update', $transaction->id) }}">
                                {{ method_field('PUT') }}
                                {{ csrf_field() }}
                                <div class="inline fields {{ $errors->has('verified') ? 'error' : '' }}">
                                    <label>Verificada</label>
                                    <div class="field">
                                        <div class="ui toggle checkbox">
                                            <input type="radio" name="verified" value="0" checked>
                                            <label>No</label>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <div class="ui toggle checkbox">
                                            <input type="radio" name="verified" value="1">
                                            <label>Si</label>
                                        </div>
                                    </div>
                                    @if ($errors->has('verified'))
                                        <span class="ui error message">
                                            <strong>{{ $errors->first('verified') }}</strong>
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