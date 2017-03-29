@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading clearfix">
        <h5 style="padding-top: 1.5px;" class="pull-left">Usuario {{ $user->name }}</h5>
        <a class="btn btn-default pull-right" href="{{ route('users.index') }}">Atras</a>
    </div>
    <div class="panel-body">
        <div class="list-group">
            <div class="list-group-item">ID: {{ $user->id }}</div>
            <div class="list-group-item">Membresia: {{ $user->membership }}</div>
            <div class="list-group-item">Rol: {{ $user->role->name }} </div>
            <div class="list-group-item">Nombre: {{ $user->name }}</div>
            <div class="list-group-item">Apellido: {{ $user->lastname }}</div>
            <div class="list-group-item">Correo Electrónico: {{ $user->email }}</div>
            <div class="list-group-item">Teléfono: {{ $user->phone }}</div>
            <div class="list-group-item">Fecha De Creación: {{ $user->created_at }}</div>
        </div>
    </div>
</div>
@endsection