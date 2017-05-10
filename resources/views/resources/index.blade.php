@extends('layouts.app')

@section('content')
<div class="ui container">
    <div class="row">
        <div class="column">
            <div class="ui clearing blue segment">
                <div style="position: relative; top: 8px;" class="ui left floated header">Recursos</div>
                <div class="ui right floated blue buttons">
                    <a class="ui button" href="{{ route('typeofresources.index') }}">Tipos de recurso</a>
                    <a class="ui button" href="{{ route('resources.create') }}">Añadir recurso</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="column">
            @if($data)
                <table class="ui three column selectable blue table">
                    <thead>
                        <tr>
                            <th>Capacidad</th>
                            <th>Costo</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $row)
                            <tr>
                                <td>{{ $row->capacity }}</td>
                                <td>{{ $row->fee }}</td>
                                <td>
                                    <div class="ui small buttons">
                                        <a class="ui green button" href="{{ route('resources.show', $row->id) }}">Info</a>
                                        <a class="ui blue button" href="{{ route('resources.edit', $row->id) }}">Editar</a>
                                        <form method="POST" action="{{ route('resources.destroy', $row->id) }}" style="display: inline;">
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
    @include('layouts._success')
</div>
@endsection