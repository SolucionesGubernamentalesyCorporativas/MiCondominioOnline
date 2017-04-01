@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading clearfix">
        <h5 style="padding-top: 1.5px;" class="pull-left">Condominio {{ $estate->name }}</h5>
        <a class="btn btn-default pull-right" href="{{ route('estates.index') }}">Atras</a>
    </div>
    <div class="panel-body">
        <ul class="list-group">
            <li class="list-group-item">ID: {{ $estate->id }}</li>
            <li class="list-group-item">Tipo De Condominio: {{ count($estate->typeOfEstate) == 1 ? $estate->typeOfEstate->name : 'Ninguno' }}</li>
            @if(count($estate->condos) >= 1)
                <li class="list-group-item">
                    Condomino:
                    @foreach($estate->condos as $condo)
                         <li>{{ $condo->name }}</li>
                    @endforeach
                </li>
            @else
                <li class="list-group-item">Condomino: Ninguno</li>
            @endif
            @if(count($estate->users) >= 1)
                <li class="list-group-item">
                    Usuario:
                    @foreach($estate->users as $user)
                        <li>{{ $user->name }}</li>
                    @endforeach    
                </li>
            @else
                <li class="list-group-item">Condomino: Ninguno</li>
            @endif
            <li class="list-group-item">Numero: {{ $estate->number}} </li>
            <li class="list-group-item">Rentado: {{ $estate->rented == 0 ? 'No' : 'Si' }}</li>
            <li class="list-group-item">Lugares De Estacionamiento: {{ $estate->number_of_parking_lots }}</li>
            <li class="list-group-item">Notas: {{ $estate->notes }}</li>
            <li class="list-group-item">Fecha De Creación: {{ $estate->created_at }}</li>
        </ul>
    </div>
</div>
@endsection