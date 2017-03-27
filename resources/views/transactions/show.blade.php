@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading clearfix">
        <h5 style="padding-top: 1.5px;" class="pull-left">Transacción {{ $transaction->name }}</h5>
        <a class="btn btn-default pull-right" href="{{ route('transactions.index') }}">Atras</a>
    </div>
    <div class="panel-body">
        <div class="list-group">
            <div class="list-group-item">ID: {{ $transaction->id }}</div>
            <div class="list-group-item">Observaciones: {{ $transaction->observations }}</div>
            <div class="list-group-item">Cantidad: {{ $transaction->ammount}} </div>
            <div class="list-group-item">Verificada: {{ $transaction->verified}} </div>
            <div class="list-group-item">Fecha De Creación: {{ $transaction->created_at }}</div>
        </div>
    </div>
</div>
@endsection