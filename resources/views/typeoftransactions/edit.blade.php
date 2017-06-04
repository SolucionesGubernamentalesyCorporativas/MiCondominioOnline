@extends('layouts.app')

@section('content')
<div class="ui container">
    <div class="row">
        <div class="column">
            <div class="ui clearing blue segment">
                <div style="position: relative; top: 8px;" class="ui left floated header">Editar {{ $typeoftransaction->name }}</div>
                <a class="ui right floated blue button" href="{{ route('typeoftransactions.index') }}">
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
                            Editar nombre
                        </div>
                        <div class="content field">
                            <form class="ui form error" role="form" method="POST" action="{{ route('typeoftransactions.update', $typeoftransaction->id) }}">
                                {{ method_field('PUT') }}
                                {{ csrf_field() }}
                                <div class="eight wide field {{ $errors->has('name') ? 'error' : '' }}">
                                    <label>Nombre</label>
                                    <input type="text" name="name" value="{{ $typeoftransaction->name }}">
                                    @if ($errors->has('name'))
                                        <span class="ui error message">
                                            <strong>{{ $errors->first('name') }}</strong>
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
                            Editar ingreso o gasto
                        </div>
                        <div class="content field">
                            <form class="ui form error" role="form" method="POST" action="{{ route('typeoftransactions.update', $typeoftransaction->id) }}">
                                {{ method_field('PUT') }}
                                {{ csrf_field() }}
                                <div class="inline fields {{ $errors->has('income_outcome') ? 'error' : '' }}">
                                    <label>Ingreso o gasto</label>
                                    <div class="field">
                                        <div class="ui toggle checkbox">
                                            <input type="radio" name="income_outcome" value="0" checked>
                                            <label>Ingreso</label>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <div class="ui toggle checkbox">
                                            <input type="radio" name="income_outcome" value="1">
                                            <label>Gasto</label>
                                        </div>
                                    </div>
                                    @if ($errors->has('income_outcome'))
                                        <span class="ui error message">
                                            <strong>{{ $errors->first('income_outcome') }}</strong>
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