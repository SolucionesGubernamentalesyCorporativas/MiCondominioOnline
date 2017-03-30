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
            <li class="list-group-item">Tipo De Condominio: {{ $estate->typeOfEstate->name }}</li>
            <li class="list-group-item">
                @foreach($estate->condos)
                    Condomino: {{ $estate->condos->name }}
                @endforeach
            </li>
            <li class="list-group-item">
                @foreach($estate->users)
                    Usuario: {{ $estate->users->name }}
                @endforeach    
            </li>
            <li class="list-group-item">Numero: {{ $estate->number}} </li>
            <li class="list-group-item">Rentado: {{ $estate->rented }}</li>
            <li class="list-group-item">Lugares De Estacionamiento: {{ $estate->number_of_parking_lots }}</li>
            <li class="list-group-item">Notas: {{ $estate->notes }}</li>
            <li class="list-group-item">Fecha De Creación: {{ $estate->created_at }}</li>
        </ul>
    </div>
</div>
@endsection