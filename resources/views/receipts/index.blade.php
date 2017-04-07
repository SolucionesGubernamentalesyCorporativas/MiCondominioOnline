@extends('layouts.app')

@section('content')
<div class="ui container">
    <div class="row">
        <div class="column">
            <div class="ui clearing blue segment">
                <div style="position: relative; top: 8px;" class="ui left floated header">Recibos</div>
                <a class="ui right floated blue button" href="{{ route('receipts.create') }}">Añadir recibo</a>
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
                                <td>{{ $row->date }}</td>
                                <td>{{ $row->name_of_img }}</td>
                                <td>{{ $row->type_of_img }}</td>
                                <td>
                                    <div class="ui buttons">
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
                        </tbody>
                    @endforeach
                </table>
            @endif
        </div>
    </div>
</div>
@endsection