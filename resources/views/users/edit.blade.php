@extends('layouts.app')

@section('content')
<div class="ui container">
    <div class="row">
        <div class="column">
            <div class="ui clearing blue segment">
                <div style="position: relative; top: 8px;" class="ui left floated header">Editar usuario {{ $user->name . ' ' . $user->lastname }}</div>
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
                <div class="ui accordion field">
                    <div class="item">
                        <div class="title">
                            <i class="icon dropdown"></i>
                            Editar nombre
                        </div>
                        <div class="content field">
                            <form class="ui form error" role="form" method="POST" action="{{ route('users.update', $user->id) }}">
                                {{ method_field('PUT') }}
                                {{ csrf_field() }}
                                <div class="eight wide field {{ $errors->has('name') ? 'error' : '' }}">
                                    <label>Nombre</label>
                                    <input type="text" name="name" placeholder="{{ $user->name }}">
                                    @if ($errors->has('name'))
                                        <span class="ui error message">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <button class="ui submit blue small button" type="submit">Guardar</button>
                            </form>
                        </div>
                    </div>
                    <div class="item">
                        <div class="title">
                            <i class="icon dropdown"></i>
                            Editar apellido
                        </div>
                        <div class="content field">
                            <form class="ui form error" role="form" method="POST" action="{{ route('users.update', $user->id) }}">
                                {{ method_field('PUT') }}
                                {{ csrf_field() }}
                                <div class="eight wide field {{ $errors->has('lastname') ? 'error' : '' }}">
                                    <label>Apellido</label>
                                    <input type="text" name="lastname" placeholder="{{ $user->lastname }}">
                                    @if ($errors->has('lastname'))
                                        <span class="ui error message">
                                            <strong>{{ $errors->first('lastname') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <button class="ui submit blue small button" type="submit">Guardar</button>
                            </form>
                        </div>
                    </div>
                    <div class="item">
                        <div class="title">
                            <i class="icon dropdown"></i>
                            Editar correo electrónico
                        </div>
                        <div class="content field">
                            <form class="ui form error" role="form" method="POST" action="{{ route('users.update', $user->id) }}">
                                {{ method_field('PUT') }}
                                {{ csrf_field() }}
                                <div class="eight wide field {{ $errors->has('email') ? 'error' : '' }}">
                                    <label>Correo electrónico</label>
                                    <input type="email" name="email" placeholder="{{ $user->email }}">
                                    @if ($errors->has('email'))
                                        <span class="ui error message">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <button class="ui submit blue small button" type="submit">Guardar</button>
                            </form>
                        </div>
                    </div>
                    <div class="item">
                        <div class="title">
                            <i class="icon dropdown"></i>
                            Editar teléfono
                        </div>
                        <div class="content field">
                            <form class="ui form error" role="form" method="POST" action="{{ route('users.update', $user->id) }}">
                                {{ method_field('PUT') }}
                                {{ csrf_field() }}
                                <div class="eight wide field {{ $errors->has('phone') ? 'error' : '' }}">
                                    <label>Teléfono</label>
                                    <input type="text" name="phone" placeholder="{{ $user->phone }}">
                                    @if ($errors->has('phone'))
                                        <span class="ui error message">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <button class="ui submit blue small button" type="submit">Guardar</button>
                            </form>
                        </div>
                    </div>
                    <div class="item">
                        <div class="title">
                            <i class="icon dropdown"></i>
                            Editar membresia
                        </div>
                        <div class="content field">
                            <form class="ui form error" role="form" method="POST" action="{{ route('users.update', $user->id) }}">
                                {{ method_field('PUT') }}
                                {{ csrf_field() }}
                                <div class="eight wide field {{ $errors->has('membership_id') ? 'error' : '' }}">
                                    <label>Membresia</label>
                                    <div class="ui selection dropdown">
                                        <input type="hidden" name="membership_id" value="{{ $user->membership_id }}">
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
                                <button class="ui submit blue small button" type="submit">Guardar</button>
                            </form>
                        </div>
                    </div>
                    <div class="item">
                        <div class="title">
                            <i class="icon dropdown"></i>
                            Editar rol
                        </div>
                        <div class="content field">
                            <form class="ui form error" role="form" method="POST" action="{{ route('users.update', $user->id) }}">
                                {{ method_field('PUT') }}
                                {{ csrf_field() }}
                                <div class="eight wide field {{ $errors->has('role_id') ? 'error' : '' }}">
                                    <label>Rol</label>
                                    <div class="ui selection dropdown">
                                        <input type="hidden" name="role_id" value="{{ $user->role_id }}">
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
                                <button class="ui submit blue small button" type="submit">Guardar</button>
                            </form>
                        </div>
                    </div>
                    <div class="item">
                        <div class="title">
                            <i class="icon dropdown"></i>
                            Editar unidades privativas
                        </div>
                        <div class="content field">
                            <form class="ui form error" role="form" method="POST" action="{{ route('users.update', $user->id) }}">
                                {{ method_field('PUT') }}
                                {{ csrf_field() }}
                                <div class="eight wide field {{ $errors->has('estate_ids') ? 'error' : '' }}">
                                    <label>Unidades privativas</label>
                                    <div class="ui multiple selection dropdown">
                                        <input type="hidden" name="estate_ids" value="{{ $idsestates }}">
                                        <i class="dropdown icon"></i>
                                        <div class="default text">Selecciona todas las unidades privativas relacionadas con el usuario</div>
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
                                <button class="ui submit blue small button" type="submit">Guardar</button>
                            </form>
                        </div>
                    </div>
                    <div class="item">
                        <div class="title">
                            <i class="icon dropdown"></i>
                            Editar condominios
                        </div>
                        <div class="content field">
                            <form class="ui form error" role="form" method="POST" action="{{ route('users.update', $user->id) }}">
                                {{ method_field('PUT') }}
                                {{ csrf_field() }}
                                <div class="eight wide field {{ $errors->has('condo_ids') ? 'error' : '' }}">
                                    <label>Condominios</label>
                                    <div class="ui multiple selection dropdown">
                                        <input type="hidden" name="condo_ids" value="{{ $idscondos }}">
                                        <i class="dropdown icon"></i>
                                        <div class="default text">Selecciona todas los condominios relacionados con el usuario</div>
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
                                <button class="ui submit blue small button" type="submit">Guardar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection