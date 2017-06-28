@extends('layouts.app')

@section('scripts')
<script>
    $('.ui .dropdown').dropdown();
</script>
@endsection

@section('content')
<div class="ui container">
    <div class="row">
        <div class="column">
            <div class="ui clearing blue segment">
                <div style="position: relative; top: 8px;" class="ui left floated header">Añadir usuario</div>
                <a class="ui right floated blue button" href="{{ route('users.index') }}">
                    <i class="angle left icon"></i>
                    Atras
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="column">
            <div class="ui blue segment">
                <div class="ui centered grid">
                    <div class="ten wide column">
                        <form class="ui form error" role="form" method="POST" action="{{ route('users.store') }}">
                            {{ csrf_field() }}
                            <div class="field {{ $errors->has('name') ? 'error' : '' }}">
                                <label>Nombre</label>
                                <input type="text" name="name" value="{{ old('name') }}" placeholder="Primer nombre" autofocus>
                                @if ($errors->has('name'))
                                    <span class="ui error message">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="field {{ $errors->has('lastname') ? 'error' : '' }}">
                                <label>Apellido</label>
                                <input type="text" name="lastname" value="{{ old('lastname') }}" placeholder="Apellido paterno">
                                @if ($errors->has('lastname'))
                                    <span class="ui error message">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="field {{ $errors->has('email') ? 'error' : '' }}">
                                <label>Correo electrónico</label>
                                <input type="email" name="email" value="{{ old('email') }}" placeholder="Correo de contacto principal">
                                @if ($errors->has('email'))
                                    <span class="ui error message">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="field {{ $errors->has('phone') ? 'error' : '' }}">
                                <label>Teléfono</label>
                                <input type="text" name="phone" value="{{ old('phone') }}" placeholder="Numero telefonico">
                                @if ($errors->has('phone'))
                                    <span class="ui error message">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="field {{ $errors->has('condo_ids') ? 'error' : '' }}">
                                <label>Condominio</label>
                                <div class="ui multiple selection dropdown">
                                    <input type="hidden" name="condo_ids" value="{{ old('condo_ids') }}">
                                    <i class="dropdown icon"></i>
                                    <div class="default text">Si el usuario pertenece a uno o mas condominios seleccionalos</div>
                                    <div class="menu">
                                        @foreach($condos as $condo)
                                            <div class="item" data-value="{{ $condo->id }}">{{ $condo->name }}</div>
                                        @endforeach
                                    </div>
                                </div>
                                @if ($errors->has('condo_ids'))
                                    <span class="ui error message">
                                        <strong>{{ $errors->first('condo_ids') }}</strong>
                                    </span>
                                @endif  
                            </div>
                            <div class="field {{ $errors->has('estate_ids') ? 'error' : '' }}">
                                <label>Unidad privativa</label>
                                <div class="ui multiple selection dropdown">
                                    <input type="hidden" name="estate_ids" value="{{ old('estate_ids') }}">
                                    <i class="dropdown icon"></i>
                                    <div class="default text">Si el usuario posee una o mas unidades privativas seleccionalas</div>
                                    <div class="menu">
                                        @foreach($estates as $estate)
                                            <div class="item" data-value="{{ $estate->id }}">{{ $estate->typeOfEstate->name . ' ' . $estate->number }}</div>
                                        @endforeach
                                    </div>
                                </div>
                                @if ($errors->has('estate_ids'))
                                    <span class="ui error message">
                                        <strong>{{ $errors->first('estate_ids') }}</strong>
                                    </span>
                                @endif  
                            </div>
                            <div class="field {{ $errors->has('role_id') ? 'error' : '' }}">
                                <label>Rol</label>
                                <div class="ui selection dropdown">
                                    <input type="hidden" name="role_id" value="{{ old('role_id') }}">
                                    <i class="dropdown icon"></i>
                                    <div class="default text">Selecciona un rol</div>
                                    <div class="menu">
                                        @foreach($roles as $role)
                                            <div class="item" data-value="{{ $role->id }}">{{ $role->name }}</div>
                                        @endforeach
                                    </div>
                                </div>
                                @if ($errors->has('role_id'))
                                    <span class="ui error message">
                                        <strong>{{ $errors->first('role_id') }}</strong>
                                    </span>
                                @endif  
                            </div>
                            <div class="field {{ $errors->has('membership_id') ? 'error' : '' }}">
                                <label>Membresia</label>
                                <div class="ui selection dropdown">
                                    <input type="hidden" name="membership_id" value="{{ old('membership_id') }}">
                                    <i class="dropdown icon"></i>
                                    <div class="default text">Selecciona una membresia</div>
                                    <div class="menu">
                                        @foreach($memberships as $membership)
                                            <div class="item" data-value="{{ $membership->id }}">{{ $membership->typeOfMembership->name }}</div>
                                        @endforeach
                                    </div>
                                </div>
                                @if ($errors->has('membership_id'))
                                    <span class="ui error message">
                                        <strong>{{ $errors->first('membership_id') }}</strong>
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
                                <label>Confirmar contraseña</label>
                                <input type="password" name="password_confirmation">
                                @if ($errors->has('password_confirmation'))
                                    <span class="ui error message">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <button class="ui submit blue button" type="submit">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection