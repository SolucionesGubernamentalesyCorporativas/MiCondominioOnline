@extends('layouts.app')

@section('content')
<div class="ui container">
    <div class="row">
        <div class="column">
            <div class="ui clearing blue segment">
                <div style="position: relative; top: 8px;" class="ui left floated header">Usuario {{ $user->name . ' ' . $user->lastname }}</div>
                <a href="{{ route('users.index') }}" class="ui right floated blue button">Atras</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="column">
            <div class="ui blue segment">
                <div class="ui relaxed divided list">
                    <div class="item">
                        <div class="content">
                            <div class="header">Nombre</div>
                            <div class="description">{{ $user->name }}</div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="content">
                            <div class="header">Apellido</div>
                            <div class="description">{{ $user->lastname }}</div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="content">
                            <div class="header">Correo electrónico</div>
                            <div class="description">{{ $user->email }}</div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="content">
                            <div class="header">Teléfono</div>
                            <div class="description">{{ $user->phone }}</div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="content">
                            <div class="header">Membresia</div>
                            <div class="description">{{ count($user->membership) == 1 ? $user->membership->typeOfMembership->name : 'Ninguna' }}</div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="content">
                            <div class="header">Rol</div>
                            <div class="description">{{ count($user->role) == 1 ? $user->role->name : 'Ninguno' }}</div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="content">
                            <div class="header">Condominios</div>
                            @if(count($user->estates) >= 1)
                                <div class="description">Condominios asociados al usuario</div>
                                <div class="list">
                                    @foreach($user->estates as $estate)
                                        <div class="item">
                                            <div class="description">{{ $estate->number }}</div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="description">Ningun condominio asociado al usuario</div>
                            @endif
                        </div>
                    </div>
                    <div class="item">
                        <div class="content">
                            <div class="header">Condominos</div>
                            @if(count($user->condos) >= 1)
                                <div class="description">Condominos asociados al usuario</div>
                                <div class="list">
                                    @foreach($user->condos as $condo)
                                        <div class="item">
                                            <div class="description">{{ $condo->name }}</div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="description">Ningun condomino asociado al usuario</div>
                            @endif
                        </div>
                    </div>
                    <div class="item">
                        <div class="content">
                            <div class="header">Transacciones</div>
                            @if(count($user->transactions) >= 1)
                                <div class="description">Transacciones asociadas al usuario</div>
                                <div class="list">
                                    @foreach($user->transactions as $transaction)
                                        <div class="item">
                                            <div class="description">{{ $transaction->typeOfTransaction->name }}</div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="description">Ninguna transacción asociada al usuario</div>
                            @endif
                        </div>
                    </div>
                    <div class="item">
                        <div class="content">
                            <div class="header">Visitantes</div>
                            @if(count($user->visitors) >= 1)
                                <div class="description">Visitantes asociados al usuario</div>
                                <div class="list">
                                    @foreach($user->visitors as $visitor)
                                        <div class="item">
                                            <div class="description">{{ $visitor->name }}</div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="description">Ningun visitante asociado al usuario</div>
                            @endif
                        </div>
                    </div>
                    <div class="item">
                        <div class="content">
                            <div class="header">Activos</div>
                            @if(count($user->assets) >= 1)
                                <div class="description">Activos asociados al usuario</div>
                                <div class="list">
                                    @foreach($user->assets as $asset)
                                        <div class="item">
                                            <div class="description">{{ $asset->name }}</div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="description">Ningun activo asociado al usuario</div>
                            @endif
                        </div>
                    </div>
                    <div class="item">
                        <div class="content">
                            <div class="header">Anuncios</div>
                            @if(count($user->announcements) >= 1)
                                <div class="description">Anuncios asociados al usuario</div>
                                <div class="list">
                                    @foreach($user->announcements as $announcement)
                                        <div class="item">
                                            <div class="description">{{ $announcement->title }}</div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="description">Ningun anuncio asociado al usuario</div>
                            @endif
                        </div>
                    </div>
                    <div class="item">
                        <div class="content">
                            <div class="header">Recurso</div>
                            @if(count($user->resources) >= 1)
                                <div class="description">Recursos asociados al usuario</div>
                                <div class="list">
                                    @foreach($user->resources as $resource)
                                        <div class="item">
                                            <div class="description">{{ $resource->typeOfResource->name }}</div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="description">Ningun recurso asociado al usuario</div>
                            @endif
                        </div>
                    </div>
                    <div class="item">
                        <div class="content">
                            <div class="header">Fecha de creación</div>
                            <div class="description">{{ $user->created_at }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection