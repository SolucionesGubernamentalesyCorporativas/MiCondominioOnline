@extends('layouts.app')

@section('content')
<div class="ui container">
    <div class="row">
        <div class="column">
            <div class="ui clearing blue segment">
                <div style="position: relative; top: 8px;" class="ui left floated header">Condominio {{ $condo->name }}</div>
                <a href="{{ route('condos.index') }}" class="ui right floated blue button">
                    <i class="angle left icon"></i>
                    Atras
                </a>
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
                            <div class="description">{{ $condo->name }}</div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="content">
                            <div class="header">Dirección</div>
                            <div class="description">{{ $condo->direction }}</div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="content">
                            <div class="header">Casas</div>
                            @if(count($condo->estates) >= 1)
                                <div class="description">Casas asociadas al condominio</div>
                                <div class="list">
                                    @foreach($condo->estates as $estate)
                                        <div class="item">
                                            <div class="description">{{ $estate->typeOfEstate->name . ' ' . $estate->number }}</div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="description">Ninguna casa asociada al condominio</div>
                            @endif
                        </div>
                    </div>
                    <div class="item">
                        <div class="content">
                            <div class="header">Usuarios</div>
                            @if(count($condo->users) >= 1)
                                <div class="description">Usuarios asociados al condominio</div>
                                <div class="list">
                                    @foreach($condo->users as $user)
                                        <div class="item">
                                            <div class="description">{{ $user->name . ' ' . $user->lastname }}</div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="description">Ningun usuario asociado al condominio</div>
                            @endif
                        </div>
                    </div>
                    <div class="item">
                        <div class="content">
                            <div class="header">Fecha de creación</div>
                            <div class="description">{{ $condo->created_at != NULL ? $condo->created_at->diffForHumans() : 'No registrado' }}</div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="content">
                            <div class="header">Ultima actualización</div>
                            <div class="description">{{ $condo->updated_at != NULL ? $condo->updated_at->diffForHumans() : 'El registro no ha sido actualizado' }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection