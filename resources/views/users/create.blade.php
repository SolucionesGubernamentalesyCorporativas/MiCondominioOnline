@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading clearfix">
        <h5 style="padding-top: 1.5px;" class="pull-left">Añadir usuario</h5>
        <a class="btn btn-default pull-right" href="{{ route('users.index') }}">Atras</a>
    </div>
    <div class="panel-body">
        <form class="form-horizontal" role="form" method="POST" action="{{ route('users.store') }}">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name" class="col-md-4 control-label">Nombre</label>
                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="name" placeholder="Primer nombre" value="{{ old('name') }}" autofocus>
                </div>
            </div>
            <div class="form-group">
                <label for="lastname" class="col-md-4 control-label">Apellido</label>
                <div class="col-md-6">
                    <input id="lastname" type="text" class="form-control" name="lastname" placeholder="Apellido paterno" value="{{ old('lastname') }}">
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="col-md-4 control-label">Correo Electrónico</label>
                <div class="col-md-6">
                    <input id="email" type="email" class="form-control" name="email" placeholder="Ejemplo: condominio@plus.com" value="{{ old('email') }}">
                </div>
            </div>
            <div class="form-group">
                <label for="phone" class="col-md-4 control-label">Teléfono</label>
                <div class="col-md-6">
                    <input id="phone" type="phone" class="form-control" name="phone" placeholder="Ejemplo: (442)1112233" value="{{ old('phone') }}">
                </div>
            </div>
            <div class="form-group">
                <label for="membership" class="col-md-4 control-label">Membresia</label>
                <div class="col-md-6">
                    <input id="membership" type="radio" name="membership_id" value="1" checked> Premium 
                    <input id="membership" type="radio" name="membership_id" value="2"> Avanzada 
                    <input id="membership" type="radio" name="membership_id" value="3"> Basica 
                </div>
            </div>
            <div class="form-group">
                <label for="role" class="col-md-4 control-label">Rol</label>
                <div class="col-md-6">
                    <input id="role" type="radio" name="role_id" value="1" checked> Administrador 
                    <input id="role" type="radio" name="role_id" value="2"> Condomino 
                    <input id="role" type="radio" name="role_id" value="3"> Residente 
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="col-md-4 control-label">Contraseña</label>
                <div class="col-md-6">
                    <input id="password" type="password" class="form-control" name="password">
                </div>
            </div>
            <div class="form-group">
                <label for="password-confirm" class="col-md-4 control-label">Confirmar Contraseña</label>
                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        Añadir usuario
                    </button>
                </div>
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