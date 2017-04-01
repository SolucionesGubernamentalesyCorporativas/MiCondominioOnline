@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading clearfix">
        <h5 style="padding-top: 1.5px;" class="pull-left">Condominios</h5>
        <a class="btn btn-default pull-right" href="{{ route('estates.create') }}">Añadir condominio</a>
    </div>
    <div class="panel-body">
        @if($data)
            <table class="table">
                <thead>
                    <tr>
                        <td>Numero</td>
                        <td>Rentado</td>
                        <td>Lugares de Estacionamiento</td>
                        <td>Notas</td>
                        <td>Opciones</td>
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
                            <a class="btn btn-info" href="{{ route('estates.show', $row->id) }}">Info</a>
                            <a class="btn btn-primary" href="{{ route('estates.edit', $row->id) }}">Editar</a>
                            <form method="POST" action="{{ route('estates.destroy', $row->id) }}" style="display: inline;">
                                {{ method_field('DELETE')}}
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