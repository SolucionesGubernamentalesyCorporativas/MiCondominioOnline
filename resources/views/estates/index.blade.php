@extends('layouts.app')

@section('content')
<div class="ui container">
    <div class="row">
        <div class="column">
            <div class="ui clearing blue segment">
                <div style="position: relative; top: 8px;" class="ui left floated header">Unidades privativas</div>
                <div class="ui right floated blue buttons">
                    <a class="ui button" href="{{ route('typeofestates.index') }}">Tipos de unidad privativa</a>
                    <a class="ui button" href="{{ route('estates.create') }}">Añadir unidad privativa</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="column">
            <div class="ui secondary menu">
                <div class="header item">Filtrar por</div>
                <div class="ui dropdown item">
                    Condominio
                    <i class="dropdown icon"></i>
                    <div class="menu">
                        @foreach ($condos as $condo)
                            <a href="{{ route('estates.index', ['condo' => $condo->id]) }}" class="{{ $condo->id == request()->condo ? 'item active' : 'item' }}">{{ $condo->name }}</a>
                        @endforeach
                    </div>
                </div>
                <a href="{{ route('estates.index') }}" class="right floated item">
                    <i class="remove icon"></i>
                    Eliminar filtros
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="column">
            @if($data)
                <table class="ui five column selectable blue table">
                    <thead>
                        <tr>
                            <th>Numero</th>
                            <th>Rentado</th>
                            <th>Lugares de Estacionamiento</th>
                            <th>Notas</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $row)   
                            <tr>
                                <td>{{ $row->typeOfEstate->name . ' ' . $row->number }}</td>
                                <td>{{ $row->rented == 0 ? 'No' : 'Si' }}</td>
                                <td>{{ $row->number_of_parking_lots }}</td>
                                <td>{{ $row->notes }}</td>
                                <td>
                                    <div class="ui small buttons">
                                        <a class="ui green button" href="{{ route('estates.show', $row->id) }}">Info</a>
                                        <a class="ui blue button" href="{{ route('estates.edit', $row->id) }}">Editar</a>
                                        <form method="POST" action="{{ route('estates.destroy', $row->id) }}" style="display: inline;">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="ui red button">Borrar</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
    {{ $data->links() }}
    @include('layouts._message')
</div>
@endsection