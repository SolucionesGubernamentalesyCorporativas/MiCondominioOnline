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
            <li class="list-group-item">Membresia: {{ count($user->membership) == 1 ? $user->membership->typeOFMembership->name : 'Ninguno' }}</li>
            <li class="list-group-item">Rol: {{ count($user->role) == 1 ? $user->role->name : 'Ninguno' }}</li>
            @if(count($user->estates) >= 1)
                <li class="list-group-item">
                    Condominios: 
                    @foreach($user->estates as $estate)
                        <li>{{ $estate->number }}</li> 
                    @endforeach
                </li>
            @else
                <li class="list-group-item">Condominios: Ninguno</li>
            @endif
            @if(count($user->condos) >= 1)
                <li class="list-group-item">
                    Condominos: 
                    @foreach($user->condos as $condo)
                        <li>{{ $condo->name }}</li>
                    @endforeach
                </li>
            @else
                <li class="list-group-item">Condominos: Ninguno</li>
            @endif
            @if(count($user->transactions) >= 1)
                <li class="list-group-item">
                    Transacciones: 
                    @foreach($user->transactions as $transaction)
                        <li>{{ $transaction->typeOfTransaction->name }}</li>
                    @endforeach
                </li>
            @else
                <li class="list-group-item">Transacciones: Ninguna</li>
            @endif
            @if(count($user->visitors) >= 1)
                <li class="list-group-item">
                    Visitantes: 
                    @foreach($user->visitors as $visitor)
                        <li>{{ $visitor->name }}</li>
                    @endforeach
                </li>
            @else
                <li class="list-group-item">Visitantes: Ninguno</li>
            @endif
            @if(count($user->assets) >= 1)
                <li class="list-group-item">
                    Activos: 
                    @foreach($user->assets as $asset)
                        <li>{{ $asset->name }}</li>
                    @endforeach
                </li>
            @else
                <li class="list-group-item">Activos: Ninguno</li>
            @endif
            @if(count($user->announcements) >= 1)
                <li class="list-group-item">
                    Anuncios: 
                    @foreach($user->announcements as $announcement)
                        <li>{{ $announcement->title }}</li>
                    @endforeach
                </li>
            @else
                <li class="list-group-item">Anuncios: Ninguno</li>
            @endif
            @if(count($user->resources) >= 1)
                <li class="list-group-item">
                    Recursos: 
                    @foreach($user->resources as $resource)
                        <li>{{ $resource->typeOfResource->name }}</li>
                    @endforeach
                </li>
            @else
                <li class="list-group-item">Recursos: Ninguno</li>
            @endif
            <li class="list-group-item">Fecha De Creación: {{ $user->created_at }}</li>
        </ul>
    </div>
</div>
@endsection