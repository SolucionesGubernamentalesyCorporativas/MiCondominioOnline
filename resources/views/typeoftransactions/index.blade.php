@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading clearfix">
        <h5 style="padding-top: 1.5px;" class="pull-left">Tipos De Transacción</h5>
        <a class="btn btn-default pull-right" href="{{ route('typeoftransactions.create') }}">Añadir tipo de transacción</a>
    </div>
    <div class="panel-body">
        @if($data)
            <table class="table">
                <thead>
                    <tr>
                        <td>Nombre</td>
                        <td>Ingreso o Gasto</td>
                        <td>Opciones</td>
                    </tr>
                </thead>
                <tbody>
                @foreach($data as $row)   
                    <tr>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->income_outcome }}</td>
                        <td>
                            <a class="btn btn-info" href="{{ route('typeoftransactions.show', $row->id) }}">Info</a>
                            <a class="btn btn-primary" href="{{ route('typeoftransactions.edit', $row->id) }}">Editar</a>
                            <form method="POST" action="{{ route('typeoftransactions.destroy', $row->id) }}" style="display: inline;">
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