@extends('layouts.app')

@section('content')
<div class="ui centered grid container">
    <div class="eight wide column">
        <div class="ui raised segments">
            <div class="ui segment">
                <div class="ui header">Registrarse</div>
            </div>
            <div class="ui blue segment">
                <form class="ui form error" role="form" method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}
                    <div class="field {{ $errors->has('name') ? 'error' : '' }}">
                        <label>Nombre</label>
                        <input type="text" name="name" value="{{ old('name') }}" autofocus>
                        @if ($errors->has('name'))
                            <span class="ui error message">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="field {{ $errors->has('lastname') ? 'error' : '' }}">
                        <label>Apellido</label>
                        <input type="text" name="lastname" value="{{ old('lastname') }}">
                        @if ($errors->has('lastname'))
                            <span class="ui error message">
                                <strong>{{ $errors->first('lastname') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="field {{ $errors->has('email') ? 'error' : '' }}">
                        <label>Correo electrónico</label>
                        <input type="email" name="email" value="{{ old('email') }}">
                        @if ($errors->has('email'))
                            <span class="ui error message">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="field {{ $errors->has('phone') ? 'error' : '' }}">
                        <label>Teléfono</label>
                        <input type="text" name="phone" value="{{ old('phone') }}">
                        @if ($errors->has('phone'))
                            <span class="ui error message">
                                <strong>{{ $errors->first('phone') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="field {{ $errors->has('password') ? 'error' : '' }}">
                        <label>Contraseña</label>
                        <input type="password" name="password" value="{{ old('password') }}">
                        @if ($errors->has('password'))
                            <span class="ui error message">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="field">
                        <label>Confirmar contraseña</label>
                        <input type="password" name="password_confirmation">
                    </div>
                    <button class="ui submit blue button" type="submit">Registrarse</button>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Registrarse</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nombre</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                            <label for="lastname" class="col-md-4 control-label">Apellido</label>

                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control" name="lastname" value="{{ old('lastname') }}" required autofocus>

                                @if ($errors->has('lastname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Correo Electrónico</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="phone" class="col-md-4 control-label">Teléfono</label>

                            <div class="col-md-6">
                                <input id="phone" type="phone" class="form-control" name="phone" value="{{ old('phone') }}" required>

                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Contraseña</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirmar Contraseña</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Registrarse
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
