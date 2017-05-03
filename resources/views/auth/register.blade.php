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
@endsection
