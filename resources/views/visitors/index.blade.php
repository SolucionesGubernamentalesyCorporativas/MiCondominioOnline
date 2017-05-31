@extends('layouts.app')

@section('content')
<div class="ui container">
    <div class="row">
        <div class="column">
            <div class="ui clearing blue segment">
                <div style="position: relative; top: 8px;" class="ui left floated header">Visitantes</div>
                <div class="ui right floated blue buttons">
                    <a class="ui button" href="{{ route('typeofvisitors.index') }}">Tipos de visitante</a>
                    <a class="ui button" href="{{ route('visitors.create') }}">Añadir visitante</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="column">
            <div class="ui blue segment">
                @if ($data)
                    @foreach ($uniqueDates as $date)
                        <div class="ui raised vertical segments">
                            <div class="ui segment">
                                <div class="header">{{ $date->toFormattedDateString() }}</div>
                            </div>
                            @foreach ($data as $row)
                                @if ($row->date_arrival == $date)
                                    <div class="ui clearing secondary segment">
                                        <div class="ui three column grid">
                                            <div class="column">
                                                <p>Nombre del visitante: {{ $row->name }}</p>
                                                <p>Domicilio que visita: {{ $row->estate->typeOfEstate->name . ' ' . $row->estate->number }}</p>
                                                <p>Relacion con el condomino: {{ $row->typeOfVisitor->name }}</p>
                                            </div>
                                            <div class="column">
                                                <p>Vehiculo: {{ $row->vehicle == 1 ? 'Si' : 'No' }}</p>
                                            </div>
                                            <div class="centered column">
                                                <div class="ui right floated small buttons">
                                                    <a class="ui green button" href="{{ route('visitors.show', $row->id) }}">Info</a>
                                                    <a class="ui blue button" href="{{ route('visitors.edit', $row->id) }}">Editar</a>
                                                    <form method="POST" action="{{ route('visitors.destroy', $row->id) }}" style="display: inline;">
                                                        {{ method_field('DELETE') }}
                                                        {{ csrf_field() }}
                                                        <button type="submit" class="ui red button">Borrar</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    {{ $data->links() }}
    @include('layouts._message')
</div>
@endsection