@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading clearfix">
        <h5 style="padding-top: 1.5px;" class="pull-left">Transacción {{ $transaction->id }}</h5>
        <a class="btn btn-default pull-right" href="{{ route('transactions.index') }}">Atras</a>
    </div>
    <div class="panel-body">
        <ul class="list-group">
            <li class="list-group-item">ID: {{ $transaction->id }}</li>
            <li class="list-group-item">Tipo de membresia: {{ count($transaction->typeOfTransaction) == 1 ? $transaction->typeOfTransaction->name : 'Ninguno' }}</li>
            <li class="list-group-item">Observaciones: {{ $transaction->observations }}</li>
            <li class="list-group-item">Cantidad: {{ $transaction->ammount }} </li>
            <li class="list-group-item">Verificada: {{ $transaction->verified }} </li>
            <li class="list-group-item">Recibo: {{ count($transaction->receipt) == 1 ? $transaction->receipt->name_of_img : 'Ninguno' }}</li>
            @if(count($transaction->users) >= 1)
                <li class="list-group-item">
                    Usuarios:
                    @foreach($transaction->users as $user)
                        <li>{{ $user->name . ' ' . $user->lastname }}</li>
                    @endforeach
                </li>
            @else
                <li class="list-group-item">Usuarios: Ninguno</li>
            @endif
            <li class="list-group-item">Fecha De Creación: {{ $transaction->created_at }}</li>
        </ul>
    </div>
</div>
@endsection