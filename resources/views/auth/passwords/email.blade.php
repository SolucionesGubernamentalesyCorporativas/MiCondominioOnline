@extends('layouts.app')

@section('content')
<div class="ui centered grid container">
    <div class="eight wide column">
        <div class="ui raised segments">
            <div class="ui segment">
                <div class="ui header">Restablece tu contraseña</div>
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
                <form class="ui form error" role="form" method="POST" action="{{ route('password.email') }}">
                    {{ csrf_field() }}
                    <div class="field {{ $errors->has('email') ? 'error' : '' }}">
                        <label>Correo electrónico</label>
                        <input type="text" name="email" value="{{ old('email') }}">
                        @if ($errors->has('email'))
                            <span class="ui error message">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <button class="ui submit blue button" type="submit">
                        Enviar enlace de restablecimiento de contraseña
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
