@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading clearfix">
        <h5 style="padding-top: 1.5px;" class="pull-left">Usuarios</h5>
        <a class="btn btn-default pull-right" href="{{ route('users.create') }}">Añadir usuario</a>
    </div>
    <div class="panel-body">
        @if($data)
            <table class="table">
                <thead>
                    <tr>
                        <td>Nombre</td>
                        <td>Apellido</td>
                        <td>E-mail</td>
                        <td>Telefono</td>
                        <td>Opciones</td>
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
                            <a class="btn btn-info" href="{{ route('users.show', $row->id) }}">Info</a>
                            <a class="btn btn-primary" href="{{ route('users.edit', $row->id) }}">Editar</a>
                            <form method="POST" action="{{ route('users.destroy', $row->id) }}" style="display: inline;">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger">Borrar</button>
                            </form>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        @endif
    </div>
</div>
@endsection