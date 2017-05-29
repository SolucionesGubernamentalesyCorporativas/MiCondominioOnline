@extends('layouts.app')

@section('content')
<div class="ui container">
    <div class="row">
        <div class="column">
            <div class="ui clearing blue segment">
                <div style="position: relative; top: 8px;" class="ui left floated header">Activo {{ $asset->name }}</div>
                <a href="{{ route('assets.index') }}" class="ui right floated blue button">
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
                            <div class="description">{{ $asset->name }}</div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="content">
                            <div class="header">Descripción</div>
                            <div class="description">{{ $asset->description }}</div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="content">
                            <div class="header">Unidad privativa asociada al activo</div>
                            <div class="description">{{ count($asset->estate) == 1 ? $asset->estate->typeOfEstate->name . ' ' . $asset->estate->number : 'Ninguno' }}</div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="content">
                            <div class="header">Fecha de creación</div>
                            <div class="description">{{ $asset->created_at != NULL ? $asset->created_at->diffForHumans() : 'No registrado' }}</div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="content">
                            <div class="header">Ultima actualización</div>
                            <div class="description">{{ $asset->updated_at != NULL ? $asset->updated_at->diffForHumans() : 'El registro no ha sido actualizado' }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection