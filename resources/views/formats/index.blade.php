@extends('layouts.app')

@section('content')
<div class="ui container">
    <div class="row">
        <div class="column">
            <div class="ui clearing blue segment">
                <div style="position: relative; top: 8px;" class="ui left floated header">Formatos</div>
                <div class="ui right floated blue buttons">
                    <a class="ui button" href="{{ route('typeofformats.index') }}">Tipos de formatos</a>
                    <a class="ui button" href="{{ route('formats.create') }}">Añadir formato</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="column">
            @if($data)
                <table class="ui two column selectable blue table">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $row)   
                            <tr>
                                <td>{{ $row->name }}</td>
                                <td>
                                    <div class="ui small buttons">
                                        <a class="ui green button" href="{{ route('formats.show', $row->id) }}">Info</a>
                                        <a class="ui blue button" href="{{ route('formats.edit', $row->id) }}">Editar</a>
                                        <form method="POST" action="{{ route('formats.destroy', $row->id) }}" style="display: inline;">
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