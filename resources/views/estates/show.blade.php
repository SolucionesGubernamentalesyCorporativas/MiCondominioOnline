@extends('layouts.app')

@section('content')
<div class="ui container">
    <div class="row">
        <div class="column">
            <div class="ui clearing blue segment">
                <div style="position: relative; top: 8px;" class="ui left floated header">Condominio {{ $estate->name }}</div>
                <a href="{{ route('estates.index') }}" class="ui right floated blue button">
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
                            <div class="header">Numero</div>
                            <div class="description">{{ $estate->number }}</div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="content">
                            <div class="header">Rentado</div>
                            <div class="description">{{ $estate->rented == 0 ? 'No' : 'Si' }}</div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="content">
                            <div class="header">Lugares de estacionamiento</div>
                            <div class="description">{{ $estate->number_of_parking_lots }}</div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="content">
                            <div class="header">Notas</div>
                            <div class="description">{{ $estate->notes }}</div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="content">
                            <div class="header">Tipo de condominio</div>
                            <div class="description">{{  count($estate->typeOfEstate) == 1 ? $estate->typeOfEstate->name : 'Ninguno' }}</div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="content">
                            <div class="header">Condominos</div>
                            @if(count($estate->condos) >= 1)
                                <div class="description">Condominos asociados al condominio</div>
                                <div class="list">
                                    @foreach($estate->condos as $condo)
                                        <div class="item">
                                            <div class="description">{{ $condo->name }}</div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="description">Ningun condomino asociado al condominio</div>
                            @endif
                        </div>
                    </div>
                    <div class="item">
                        <div class="content">
                            <div class="header">Usuarios</div>
                            @if(count($estate->users) >= 1)
                                <div class="description">Usuarios asociados al condominio</div>
                                <div class="list">
                                    @foreach($estate->users as $user)
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
                            <div class="description">{{ $estate->created_at != NULL ? $estate->created_at->diffForHumans() : 'No registrado' }}</div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="content">
                            <div class="header">Ultima actualización</div>
                            <div class="description">{{ $estate->updated_at != NULL ? $estate->updated_at->diffForHumans() : 'El registro no ha sido actualizado' }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection