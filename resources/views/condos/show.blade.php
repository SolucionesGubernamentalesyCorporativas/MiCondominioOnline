@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading clearfix">
        <h5 style="padding-top: 1.5px;" class="pull-left">Condomino {{ $condo->name }}</h5>
        <a class="btn btn-default pull-right" href="{{ route('condos.index') }}">Atras</a>
    </div>
    <div class="panel-body">
        <ul class="list-group">
            <li class="list-group-item">ID: {{ $condo->id }}</li>
            <li class="list-group-item">Condomino: {{ $condo->name }}</li>
            <li class="list-group-item">Dirección: {{ $condo->direction }}</li>
            <li class="list-group-item">
                @foreach($condo->estates as $estate)
                    Condominio: {{ $estate->number }}
                @endforeach
            </li>
            <li class="list-group-item">
                @foreach($condo->users as $user)
                    Usuario: {{ $user->name . ' ' . $user->lastname }}
                @endforeach
            </li>
            <li class="list-group-item">Fecha De Creación: {{ $condo->created_at }}</li>
        </ul>
    </div>
</div>
@endsection