@extends('layouts.app')

@section('content')
<div class="ui container">
    <div class="row">
        <div class="column">
            <div class="ui clearing blue segment">
                <div style="position: relative; top: 8px;" class="ui left floated header">Condominios</div>
                <a class="ui right floated blue button" href="{{ route('estates.create') }}">Añadir condominio</a>
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
                                <td>{{ $row->number }}</td>
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
</div>
@endsection