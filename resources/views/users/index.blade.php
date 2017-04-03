@extends('layouts.app')

@section('content')
<div class="ui segments">
    <div class="ui clearing segment">
        <div style="padding-top: 3.5px;" class="ui left floated header">Usuarios</div>
        <button class="ui right floated button" href="{{ route('users.create') }}">Añadir usuario</button>
    </div>
    <div class="ui segment">
        @if($data)
            <table class="ui selectable table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>E-mail</th>
                        <th>Telefono</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($data as $row)   
                    <tr>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->lastname }}</td>
                        <td>{{ $row->email }}</td>
                        <td>{{ $row->phone }}</td>
                        <td>
                            <div class="ui buttons">
                                <button class="ui button" href="{{ route('users.show', $row->id) }}">Info</button>
                                <button class="ui button" href="{{ route('users.edit', $row->id) }}">Editar</button>
                                <form method="POST" action="{{ route('users.destroy', $row->id) }}" style="display: inline;">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="ui button">Borrar</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        @endif
    </div>
</div>
@endsection