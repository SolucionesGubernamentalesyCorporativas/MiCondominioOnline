@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading clearfix">
        <h5 style="padding-top: 1.5px;" class="pull-left">Editar usuario {{ $user->name }}</h5>
        <a class="btn btn-default pull-right" href="{{ route('users.index') }}">Atras</a>
    </div>
    <div class="panel-body">
        <form class="form-horizontal" role="form" method="POST" action="{{ route('users.update', $user->id) }}">
            {{ method_field('PUT') }}
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name" class="col-md-4 control-label">Nombre</label>
                <div class="col-md-4">
                    <input id="name" type="text" class="form-control" name="name" placeholder="{{ $user->name }}" value="{{ old('name') }}" autofocus>
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
        <form class="form-horizontal" role="form" method="POST" action="{{ route('users.update', $user->id) }}">
            {{ method_field('PUT') }}
            {{ csrf_field() }}
            <div class="form-group">
                <label for="lastname" class="col-md-4 control-label">Apellido</label>
                <div class="col-md-4">
                    <input id="lastname" type="text" class="form-control" name="lastname" placeholder="{{ $user->lastname }}" value="{{ old('lastname') }}">
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
        <form class="form-horizontal" role="form" method="POST" action="{{ route('users.update', $user->id) }}">
            {{ method_field('PUT') }}
            {{ csrf_field() }}
            <div class="form-group">
                <label for="email" class="col-md-4 control-label">Correo Electrónico</label>
                <div class="col-md-4">
                    <input id="email" type="email" class="form-control" name="email" placeholder="{{ $user->email }}" value="{{ old('email') }}">
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
        <form class="form-horizontal" role="form" method="POST" action="{{ route('users.update', $user->id) }}">
            {{ method_field('PUT') }}
            {{ csrf_field() }}
            <div class="form-group">
                <label for="phone" class="col-md-4 control-label">Teléfono</label>
                <div class="col-md-4">
                    <input id="phone" type="numeric" class="form-control" name="phone" placeholder="{{ $user->phone }}" value="{{ old('phone') }}">
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
        <form class="form-horizontal" role="form" method="POST" action="{{ route('users.update', $user->id) }}">
            {{ method_field('PUT') }}
            {{ csrf_field() }}
            <div class="form-group">
                <label for="membership" class="col-md-4 control-label">Membresia</label>
                <div class="col-md-5">
                    <input id="membership" type="radio" name="membership_id" value="1" checked> Premium 
                    <input id="membership" type="radio" name="membership_id" value="2"> Avanzada 
                    <input id="membership" type="radio" name="membership_id" value="3"> Basica 
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
        <form class="form-horizontal" role="form" method="POST" action="{{ route('users.update', $user->id) }}">
            {{ method_field('PUT') }}
            {{ csrf_field() }}
            <div class="form-group">
                <label for="role" class="col-md-4 control-label">Rol</label>
                <div class="col-md-5">
                    <input id="role" type="radio" name="role_id" value="1" checked> Administrador 
                    <input id="role" type="radio" name="role_id" value="2"> Condomino 
                    <input id="role" type="radio" name="role_id" value="3"> Residente 
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</div>
@endsection