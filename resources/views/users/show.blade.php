@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading clearfix">
        <h5 style="padding-top: 1.5px;" class="pull-left">Usuario {{ $user->name }}</h5>
        <a class="btn btn-default pull-right" href="{{ route('users.index') }}">Atras</a>
    </div>
    <div class="panel-body">
        <ul class="list-group">
            <li class="list-group-item">ID: {{ $user->id }}</li>
            <li class="list-group-item">Nombre: {{ $user->name }}</li>
            <li class="list-group-item">Apellido: {{ $user->lastname }}</li>
            <li class="list-group-item">Correo Electrónico: {{ $user->email }}</li>
            <li class="list-group-item">Teléfono: {{ $user->phone }}</li>
            <li class="list-group-item">Membresia: {{ $user->membership->typeOfMembership->name }}</li>
            <li class="list-group-item">Rol: {{ $user->role->name }} </li>
            <li class="list-group-item">
                Condominios: 
                @foreach($user->estates)
                    <li>{{ $user->estates->number }}</li> 
                @endforeach
            </li>
            <li class="list-group-item">
                Condominos: 
                @foreach($user->condos)
                    <li>{{ $user->condos->name }}</li>
                @endforeach
            </li>
            <li class="list-group-item">
                Transacciones: 
                @foreach($user->transactions)
                    <li>{{ $user->transactions->typeOfTransaction->name }}</li>
                @endforeach
            </li>
            <li class="list-group-item">
                Visitantes: 
                @foreach($user->visitors)
                    <li>{{ $user->visitors->name }}</li>
                @endforeach
            </li>
            <li class="list-group-item">
                Activos: 
                @foreach($user->assets)
                    <li>{{ $user->assets->name }}</li>
                @endforeach
            </li>
            <li class="list-group-item">
                Anuncios: 
                @foreach($user->announcements)
                    <li>{{ $user->announcements->title }}</li>
                @endforeach
            </li>
            <li class="list-group-item">
                Recursos: 
                @foreach($user->resources)
                    <li>{{ $user->resources->typeOfResource->name }}</li>
                @endforeach
            </li>
            <li class="list-group-item">Fecha De Creación: {{ $user->created_at }}</li>
        </ul>
    </div>
</div>
@endsection