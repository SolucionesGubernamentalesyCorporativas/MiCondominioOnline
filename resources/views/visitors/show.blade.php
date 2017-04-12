@extends('layouts.app')

@section('content')
<div class="ui container">
    <div class="row">
        <div class="column">
            <div class="ui clearing blue segment">
                <div style="position: relative; top: 8px;" class="ui left floated header">Visitante {{ $visitor->name }}</div>
                <a href="{{ route('visitors.index') }}" class="ui right floated blue button">Atras</a>
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
                            <div class="description">{{ $visitor->name }}</div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="content">
                            <div class="header">Fecha de llegada</div>
                            <div class="description">{{ $visitor->date_arrival }}</div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="content">
                            <div class="header">Vehiculo</div>
                            <div class="description">{{ $visitor->vehicle == 0 ? 'No' : 'Si' }}</div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="content">
                            <div class="header">Usuario</div>
                            <div class="description">{{ count($visitor->user) == 1 ? $visitor->user->name . ' ' . $visitor->user->lastname : 'Ninguno' }}</div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="content">
                            <div class="header">Fecha de creación</div>
                            <div class="description">{{ $visitor->created_at }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection