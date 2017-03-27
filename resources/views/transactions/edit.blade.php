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
                <strong>Observaciones:</strong>
                <input class="form-control" type="text" name="observations">
            </div>
            <div class="form-group">
                <strong>Cantidad:</strong>
                <input class="form-control" type="text" name="ammount">
            </div>
            <div class="form-group">
                <strong>Verificada:</strong>
                <input class="form-control" type="checkbox" name="verified" value="1">
            </div>
            <button type="submit" class="btn btn-primary">Editar</button>
        </form>
    </div>
</div>
@endsection