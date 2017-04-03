@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading clearfix">
        <h5 style="padding-top: 1.5px;" class="pull-left">Recibo {{ $receipt->name_of_img }}</h5>
        <a class="btn btn-default pull-right" href="{{ route('receipts.index') }}">Atras</a>
    </div>
    <div class="panel-body">
        <ul class="list-group">
            <li class="list-group-item">ID: {{ $receipt->id }}</li>
            <li class="list-group-item">Fecha: {{ $receipt->date }}</li>
            <li class="list-group-item">Nombre de la imagen: {{ $receipt->name_of_img }}</li>
            <li class="list-group-item">Tipo de imagen: {{ $receipt->type_of_img }}</li>
            <li class="list-group-item">Transacción: {{ count($receipt->transaction) == 1 ? $receipt->transaction->id : 'Ninguna' }}</li>
            <li class="list-group-item">Fecha de Creación: {{ $receipt->created_at }}</li>
        </ul>
    </div>
</div>
@endsection