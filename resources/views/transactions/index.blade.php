@extends('layouts.app')

@section('content')
<div class="ui container">
    <div class="row">
        <div class="column">
            <div class="ui clearing blue segment">
                <div style="position: relative; top: 8px;" class="ui left floated header">Transacciones</div>
                <div class="ui right floated blue buttons">
                    <a class="ui button" href="{{ route('receipts.index') }}">Recibos</a>
                    <a class="ui button" href="{{ route('typeoftransactions.index') }}">Tipos de transacciones</a>
                    <a class="ui button" href="{{ route('transactions.create') }}">Añadir transacción</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="column">
            <div class="ui secondary menu">
                <div class="header item">Ordenar por</div>
                <div class="ui dropdown item">
                    Cantidad
                    <i class="dropdown icon"></i>
                    <div class="menu">
                        <a class="item" href="{{ route('transactions.index', ['sort' => 'asc']) }}"><i class="sort numeric ascending icon"></i></a>
                        <a class="item" href="{{ route('transactions.index', ['sort' => 'desc']) }}"><i class="sort numeric descending icon"></i></a>
                    </div>
                </div>
                <div class="header item">Filtrar por</div>
                <div class="ui dropdown item">
                    Verificación
                    <i class="dropdown icon"></i>
                    <div class="menu">
                        <a class="item" href="{{ route('transactions.index', ['verified' => 0]) }}">No verificadas</a>
                        <a class="item" href="{{ route('transactions.index', ['verified' => 1]) }}">Verificadas</a>
                    </div>
                </div>
                <a href="{{ route('transactions.index') }}" class="right floated item">
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
                            <th>Observaciones</th>
                            <th>Cantidad</th>
                            <th>Verificada</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $row)   
                            <tr>
                                <td>{{ $row->observations }}</td>
                                <td>{{ $row->ammount }}</td>
                                <td class="{{ $row->verified == 0 ? 'warning' : 'positive ' }}">{{ $row->verified == 0 ? 'No' : 'Si' }}</td>
                                <td>
                                    <div class="ui small buttons">
                                        <a class="ui green button" href="{{ route('transactions.show', $row->id) }}">Info</a>
                                        <a class="ui blue button" href="{{ route('transactions.edit', $row->id) }}">Editar</a>
                                        <form method="POST" action="{{ route('transactions.destroy', $row->id) }}" style="display: inline;">
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