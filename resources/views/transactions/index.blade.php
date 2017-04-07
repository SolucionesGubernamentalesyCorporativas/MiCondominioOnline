@extends('layouts.app')

@section('content')
<div class="ui container">
    <div class="row">
        <div class="column">
            <div class="ui clearing blue segment">
                <div style="position: relative; top: 8px;" class="ui left floated header">Transacción</div>
                <a class="ui right floated blue button" href="{{ route('transactions.create') }}">Añadir transacción</a>
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
                                <td>{{ $row->verified == 0 ? 'No' : 'Si' }}</td>
                                <td>
                                    <div class="ui buttons">
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
                        </tbody>
                    @endforeach
                </table>
            @endif
        </div>
    </div>
</div>
@endsection