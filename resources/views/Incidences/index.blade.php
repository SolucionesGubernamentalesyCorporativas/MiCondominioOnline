@extends('layouts.app')

@section('content')
<div class="ui container">
    <div class="row">
        <div class="column">
            <div class="ui clearing blue segment">
                <div style="position: relative; top: 8px;" class="ui left floated header">Incidencias</div>
                <div class="ui right floated blue buttons">
                    <a class="ui button" href="{{ route('typeofincidences.index') }}">Tipos de incidencia</a>
                    <a class="ui button" href="{{ route('incidences.create') }}">Añadir incidencia</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="column">
            <div class="ui blue segment">
                @if ($data)
                    <div class="ui divided items">
                        @foreach ($data as $row)
                            <div class="item">
                                <div class="image">
                                    <img src="{{ $urls[$row->id][0] }}" alt="foto {{ $row->typeOfIncidence->name }}">
                                </div>
                                <div class="content">
                                    <a href="{{ route('incidences.show', $row->id) }}">
                                        <div class="header">{{ $row->typeOfIncidence->name }} - {{ $row->date->format('Y-m-d') }}</div>
                                    </a>
                                    <div class="description">
                                        {{ $row->description }}
                                    </div>
                                    <div class="extra">
                                        <div class="ui buttons">
                                            <a href="{{ route('incidences.edit', $row->id) }}" class="ui blue button">Editar</a>
                                            <form action="{{ route('incidences.destroy', $row->id) }}" method="POST" style="display: inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="ui red button">Borrar</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
    {{ $data->links() }}
    @include('layouts._success')
</div>
@endsection