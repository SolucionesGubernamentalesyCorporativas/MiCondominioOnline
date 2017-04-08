@extends('layouts.app')
<!-- Login form -->
@section('content')
<div class="ui centered grid container">
    <div class="eight wide column">
        <div class="ui raised segments">
            <div class="ui segment">
                <div class="ui header">Iniciar sesión</div>
            </div>
            <div class="ui blue segment">
                <form class="ui form error" role="form" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                    <div class="field {{ $errors->has('email') ? 'error' : '' }}">
                        <label>Correo electrónico</label>
                        <input type="email" name="email" value="{{ old('email') }}" autofocus>
                        @if ($errors->has('email'))
                            <span class="ui error message">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="field {{ $errors->has('password') ? 'error' : '' }}">
                        <label>Contraseña</label>
                        <input type="password" name="password" >
                        @if ($errors->has('password'))
                            <span class="ui error message">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="inline field">
                        <div class="ui toggle checkbox">
                        <input type="checkbox" name="remember" tabindex="0" class="hidden">
                        <label>Recuerdame</label>
                        </div>
                    </div>
                    <button class="ui submit blue button" type="submit">Iniciar sesión</button>
                    <a href="{{ route('password.request') }}">¿Olvidaste Tu Contraseña?</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
