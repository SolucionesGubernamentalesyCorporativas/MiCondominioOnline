@extends('layouts.app')

@section('content')
<div class="ui container">
    <div class="row">
        <div class="column">
            <div class="ui clearing blue segment">
                <div style="position: relative; top: 8px;" class="ui left floated header">Tipos de formato</div>
                <div class="ui right floated blue buttons">
                    <a class="ui button" href="{{ route('formats.index') }}">
                        <i class="left angle icon"></i>
                        Atras
                    </a>
                    <a class="ui right floated blue button" href="{{ route('typeofformats.create') }}">Añadir tipo de formato</a>
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
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $row)   
                            <tr>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->description }}</td>
                                <td>
                                    <div class="ui small buttons">
                                        <a class="ui green button" href="{{ route('typeofformats.show', $row->id) }}">Info</a>
                                        <a class="ui blue button" href="{{ route('typeofformats.edit', $row->id) }}">Editar</a>
                                        <form method="POST" action="{{ route('typeofformats.destroy', $row->id) }}" style="display: inline;">
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