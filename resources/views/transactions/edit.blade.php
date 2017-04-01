@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading clearfix">
        <h5 style="padding-top: 1.5px;" class="pull-left">Editar transacción {{ $transaction->name }}</h5>
        <a class="btn btn-default pull-right" href="{{ route('transactions.index') }}">Atras</a>
    </div>
    <div class="panel-body">
        <form class="form-horizontal" role="form" method="POST" action="{{ route('transactions.update', $transaction->id) }}">
            {{ method_field('PUT') }}
            {{ csrf_field() }}
            <div class="form-group">
                <label for="observations" class="col-md-4 control-label">Observaciones</label>
                <div class="col-md-4">
                    <input id="observations" type="text" class="form-control" name="observations" placeholder="{{ $transaction->observations }}" value="{{ old('observations') }}" autofocus>
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
        <form class="form-horizontal" role="form" method="POST" action="{{ route('transactions.update', $transaction->id) }}">
            {{ method_field('PUT') }}
            {{ csrf_field() }}
            <div class="form-group">
                <label for="ammount" class="col-md-4 control-label">Cantidad</label>
                <div class="col-md-4">
                    <input id="ammount" type="numeric" class="form-control" name="ammount" placeholder="{{ $transaction->ammount }}" value="{{ old('ammount') }}" autofocus>
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
        <form class="form-horizontal" role="form" method="POST" action="{{ route('transactions.update', $transaction->id) }}">
            {{ method_field('PUT') }}
            {{ csrf_field() }}
            <div class="form-group">
                <label for="verified" class="col-md-4 control-label">Verificada</label>
                <div class="col-md-4">
                    <input id="verified" type="radio" name="verified" value="0" checked> No
                    <input id="verified" type="radio" name="verified" value="1"> Si
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</div>
@endsection