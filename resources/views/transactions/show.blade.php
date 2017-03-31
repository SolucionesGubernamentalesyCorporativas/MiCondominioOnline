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
            @if(count($transaction->typeoftransaction) == 1)
                <li class="list-group-item">Nombre de la transacción: {{ $transaction->typeOfTransaction->name }}</li>
            @else
                <li class="list-group-item">Nombre de la transacción: Ninguno</li>
            @endif
            <li class="list-group-item">Observaciones: {{ $transaction->observations }}</li>
            <li class="list-group-item">Cantidad: {{ $transaction->ammount }} </li>
            <li class="list-group-item">Verificada: {{ $transaction->verified }} </li>
            @if(count($transaction->receipt) == 1)
                <li class="list-group-item">Recibo: {{ $transaction->receipt->name_of_img }}</li>
            @else
                <li class="list-group-item">Recibo: Ninguno</li>
            @endif
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