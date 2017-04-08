@extends('layouts.app')

@section('content')
<div class="ui container">
    <div class="row">
        <div class="column">
            <div class="ui clearing blue segment">
                <div style="position: relative; top: 8px;" class="ui left floated header">Tipo de visita {{ $typeofvisitor->name }}</div>
                <a href="{{ route('typeofvisitors.index') }}" class="ui right floated blue button">Atras</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="column">
            <div class="ui blue segment">
                <div class="ui relaxed divided list">
                    <div class="item">
                        <div class="content">
                            <div class="header">ID</div>
                            <div class="description">{{ $typeofvisitor->id }}</div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="content">
                            <div class="header">Descripción</div>
                            <div class="description">{{ $typeofvisitor->description }}</div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="content">
                            <div class="header">Visitante</div>
                            <div class="description">{{ count($typeofvisitor->visitor) == 1 ? $typeofvisitor->visitor->name : 'Ninguno' }}</div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="content">
                            <div class="header">Fecha de creación</div>
                            <div class="description">{{ $typeofvisitor->created_at }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection