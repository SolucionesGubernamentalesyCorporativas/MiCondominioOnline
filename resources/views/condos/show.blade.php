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
            @if(count($condo->estates) >= 1)
                <li class="list-group-item">
                    Condominios:
                    @foreach($condo->estates as $estate)
                        <li>{{ $estate->number }}</li>
                    @endforeach
                </li>
            @else
                <li class="list-group-item">Condominio: Ninguno</li>
            @endif
            @if(count($condo->users) >= 1)
                <li class="list-group-item">
                    Usuarios:
                    @foreach($condo->users as $user)
                        <li>{{ $user->name . ' ' . $user->lastname }}</li>
                    @endforeach
                </li>
            @else
                <li class="list-group-item">Usuarios: Ninguno</li>
            @endif
            <li class="list-group-item">Fecha De Creación: {{ $condo->created_at }}</li>
        </ul>
    </div>
</div>
@endsection