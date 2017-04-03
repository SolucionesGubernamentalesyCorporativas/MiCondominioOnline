@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading clearfix">
        <h5 style="padding-top: 1.5px;" class="pull-left">Recibos</h5>
        <a class="btn btn-default pull-right" href="{{ route('receipts.create') }}">Añadir recibo</a>
    </div>
    <div class="panel-body">
        @if($data)
            <table class="table">
                <thead>
                    <tr>
                        <td>Fecha</td>
                        <td>Nombre de imagen</td>
                        <td>Tipo de imagen</td>
                        <td>Opciones</td>
                    </tr>
                </thead>
                <tbody>
                @foreach($data as $row)   
                    <tr>
                        <td>{{ $row->date }}</td>
                        <td>{{ $row->name_of_img }}</td>
                        <td>{{ $row->type_of_img }}</td>
                        <td>
                            <a class="btn btn-info" href="{{ route('receipts.show', $row->id) }}">Info</a>
                            <a class="btn btn-primary" href="{{ route('receipts.edit', $row->id) }}">Editar</a>
                            <form method="POST" action="{{ route('receipts.destroy', $row->id) }}" style="display: inline;">
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