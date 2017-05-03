@extends('layouts.app')

@section('content')
<div class="ui centered grid container">
    <div class="eight wide column">
        <div class="ui raised segments">
            <div class="ui segment">
                <div class="ui header">Restablecer contraseña</div>
            </div>
            <div class="ui blue segment">
                @if (session('status'))
                    <div class="row">
                        <div class="column">
                            <div class="ui success message">
                                <p>{{ session('status') }}</p>
                            </div>
                        </div>
                    </div>
                @endif
                <form class="ui form error" role="form" method="POST" action="{{ route('password.request') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="token" value="{{ $token }}">
                     <div class="field {{ $errors->has('email') ? 'error' : '' }}">
                        <label>Correo electrónico</label>
                        <input type="text" name="email" value="{{ $email or old('email') }}" autofocus>
                        @if ($errors->has('email'))
                            <span class="ui error message">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="field {{ $errors->has('password') ? 'error' : '' }}">
                        <label>Contraseña</label>
                        <input type="password" name="password">
                        @if ($errors->has('password'))
                            <span class="ui error message">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="field {{ $errors->has('password_confirmation') ? 'error' : '' }}">
                        <label>Contraseña</label>
                        <input type="password" name="password_confirmation">
                        @if ($errors->has('password_confirmation'))
                            <span class="ui error message">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                        @endif
                    </div>
                    <button class="ui submit blue button" type="submit">
                        Restablecer contraseña
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
