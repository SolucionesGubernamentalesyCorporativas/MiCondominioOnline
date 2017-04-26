@extends('layouts.app')

@section('content')
<div class="ui container">
    <div class="row">
        <div class="column">
            <div class="ui clearing blue segment">
                <div style="position: relative; top: 8px;" class="ui left floated header">Tipos de transacción</div>
                <div class="ui right floated blue buttons">
                    <a class="ui button" href="{{ route('transactions.index') }}">
                        <i class="left angle icon"></i>
                        Atras
                    </a>
                    <a class="ui right floated blue button" href="{{ route('typeoftransactions.create') }}">Añadir tipo de transacción</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="column">
            <div class="ui secondary menu">
                <div class="header item">Filtrar por</div>
                <div class="ui dropdown item">
                    Ingreso o gasto
                    <i class="dropdown icon"></i>
                    <div class="menu">
                        <a class="item" href="{{ route('typeoftransactions.index', ['income_outcome' => '0']) }}">Ingreso</a>
                        <a class="item" href="{{ route('typeoftransactions.index', ['income_outcome' => '1']) }}">Gasto</a>
                    </div>
                </div>
                <a href="{{ route('typeoftransactions.index') }}" class="right floated item">
                    <i class="remove icon"></i>
                    Eliminar filtros
                </a>
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
                            <th>Ingreso o Gasto</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $row)   
                            <tr>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->income_outcome == 0 ? 'Ingreso' : 'Gasto' }}</td>
                                <td>
                                    <div class="ui small buttons">
                                        <a class="ui green button" href="{{ route('typeoftransactions.show', $row->id) }}">Info</a>
                                        <a class="ui blue button" href="{{ route('typeoftransactions.edit', $row->id) }}">Editar</a>
                                        <form method="POST" action="{{ route('typeoftransactions.destroy', $row->id) }}" style="display: inline;">
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