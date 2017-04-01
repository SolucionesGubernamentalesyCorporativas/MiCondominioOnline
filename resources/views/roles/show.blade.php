@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading clearfix">
        <h5 style="padding-top: 1.5px;" class="pull-left">Rol {{ $role->name }}</h5>
        <a class="btn btn-default pull-right" href="{{ route('roles.index') }}">Atras</a>
    </div>
    <div class="panel-body">
        <ul class="list-group">
            <li class="list-group-item">ID: {{ $role->id }}</li>
            <li class="list-group-item">Rol: {{ $role->name}} </li>
            <li class="list-group-item">Permiso: {{ count($role->permission) == 1 ? $role->permission->name : 'Ninguno' }}</li>
            @if(count($role->users) >= 1)
                <li class="list-group-item">
                    Usuarios:
                    @foreach($role->users as $user)
                        <li>{{ $user->name . ' ' . $user->lastname }}</li>
                    @endforeach    
                </li>
            @else
                <li class="list-group-item">Usuarios: Ninguno</li>
            @endif
            <li class="list-group-item">Fecha De Creación: {{ $role->created_at }}</li>
        </ul>
    </div>
</div>
@endsection