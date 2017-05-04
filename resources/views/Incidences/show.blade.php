@extends('layouts.app')

@section('content')
<div class="ui container">
    <div class="row">
        <div class="column">
            <div class="ui clearing blue segment">
                <div style="position: relative; top: 8px;" class="ui left floated header">Incidencia {{ $incidence->id }}</div>
                <a href="{{ route('incidences.index') }}" class="ui right floated blue button">
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
                            <div class="header">Descripción</div>
                            <div class="description">{{ $incidence->description }}</div>
                        </div>
                    </div>
                    
                    <div class="item">
                        <div class="content">
                            <div class="header">Tipo de incidencia</div>
                            <div class="description">{{ count($incidence->typeOfIncidence) == 1 ? $incidence->typeOfIncidence->name : 'Ninguno' }}</div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="content">
                            <div class="header">Casa</div>
                            <div class="description">{{ count($incidence->estate) == 1 ? $incidence->estate->number : 'Ninguno' }}</div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="content">
                            <div class="header">Fecha de creación</div>
                            <div class="description">{{ $incidence->created_at != NULL ? $incidence->created_at->diffForHumans() : 'No registrado' }}</div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="content">
                            <div class="header">Ultima actualización</div>
                            <div class="description">{{ $incidence->updated_at != NULL ? $incidence->updated_at->diffForHumans() : 'El registro no ha sido actualizado' }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection