@extends('layouts.app')

@section('content')
<div class="ui container">
    <div class="row">
        <div class="column">
            <div class="ui clearing blue segment">
                <div style="position: relative; top: 8px;" class="ui left floated header">Recursos</div>
                <a class="ui right floated blue button" href="{{ route('resources.create') }}">Añadir recurso</a>
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
    @if(session('success'))
        <div class="row">
            <div class="column">
                <div class="ui success message">
                    <p>{{ session('success') }}</p>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection