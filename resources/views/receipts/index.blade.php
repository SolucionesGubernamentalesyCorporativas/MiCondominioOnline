@extends('layouts.app')

@section('content')
<div class="ui container">
    <div class="row">
        <div class="column">
            <div class="ui clearing blue segment">
                <div style="position: relative; top: 8px;" class="ui left floated header">Recibos</div>
                <div class="ui right floated blue buttons">
                    <a class="ui button" href="{{ route('transactions.index') }}">
                        <i class="left angle icon"></i>
                        Atras
                    </a>
                    <a class="ui right floated blue button" href="{{ route('receipts.create') }}">Añadir recibo</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="column">
            <div class="ui secondary menu">
                <div class="header item">Ordenar por</div>
                <div class="ui dropdown item">
                    Fecha
                    <i class="dropdown icon"></i>
                    <div class="menu">
                        <a class="item" href="{{ route('receipts.index', ['sort' => 'asc']) }}"><i class="sort numeric ascending icon"></i></a>
                        <a class="item" href="{{ route('receipts.index', ['sort' => 'desc']) }}"><i class="sort numeric descending icon"></i></a>
                    </div>
                </div>
                <a href="{{ route('receipts.index') }}" class="right floated item">
                    <i class="remove icon"></i>
                    Eliminar filtros
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="column">
            @if($data)
                <table class="ui four column selectable blue table">
                    <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Nombre de imagen</th>
                            <th>Tipo de imagen</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $row)   
                            <tr>
                                <td>{{ $row->date->toFormattedDateString() }}</td>
                                <td>{{ $row->name_of_img }}</td>
                                <td>{{ $row->type_of_img }}</td>
                                <td>
                                    <div class="ui small buttons">
                                        <a class="ui green button" href="{{ route('receipts.show', $row->id) }}">Info</a>
                                        <a class="ui blue button" href="{{ route('receipts.edit', $row->id) }}">Editar</a>
                                        <form method="POST" action="{{ route('receipts.destroy', $row->id) }}" style="display: inline;">
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