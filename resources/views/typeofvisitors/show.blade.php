@extends('layouts.app')

@section('content')
<div class="ui container">
    <div class="row">
        <div class="column">
            <div class="ui clearing blue segment">
                <div style="position: relative; top: 8px;" class="ui left floated header">Tipo de visitante {{ $typeofvisitor->name }}</div>
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
                            <div class="header">Nombre</div>
                            <div class="description">{{ $typeofvisitor->name }}</div>
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
                            <div class="header">Visitantes</div>
                            @if(count($typeofvisitor->visitors) >= 1)
                                <div class="description">Visitantes asociados al tipo de visitante</div>
                                <div class="list">
                                    @foreach($typeofvisitor->visitors as $visitor)
                                        <div class="item">
                                            <div class="description">{{ $visitor->name }}</div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="description">Ningun visitante asociado al tipo de visitante</div>
                            @endif
                        </div>
                    </div>
                    <div class="item">
                        <div class="content">
                            <div class="header">Fecha de creación</div>
                            <div class="description">{{ $typeofvisitor->created_at != NULL ? $typeofvisitor->created_at->diffForHumans() : 'No registrado' }}</div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="content">
                            <div class="header">Ultima actualización</div>
                            <div class="description">{{ $typeofvisitor->updated_at != NULL ? $typeofvisitor->updated_at->diffForHumans() : 'El registro no ha sido actualizado' }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection