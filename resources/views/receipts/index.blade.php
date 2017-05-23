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
                <div class="header item">Filtrar por</div>
                <div class="ui dropdown item">
                    Verificación
                    <i class="dropdown icon"></i>
                    <div class="menu">
                        <a class="item" href="{{ route('receipts.index', ['verified' => 0]) }}">No verificadas</a>
                        <a class="item" href="{{ route('receipts.index', ['verified' => 1]) }}">Verificadas</a>
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
            <div class="ui blue segment">
                @if ($data)
                    <div class="ui divided items">
                        @foreach ($data as $row)
                            <div class="item">
                                <div class="image">
                                    <img src="{{ $urls[$row->id] }}" alt="foto-recibo-{{ $row->transaction->observations }}">
                                </div>
                                <div class="content">
                                    <a href="{{ route('receipts.show', $row->id) }}">
                                        <div class="header">{{ $row->transaction->typeOfTransaction->name }} - {{ $row->date->format('Y-m-d') }}</div>
                                    </a>
                                    <div class="description">
                                        {{ $row->transaction->observations }}
                                    </div>
                                    <div class="extra">
                                        <span>Recibo verificado: {{ $row->verified == 0 ? 'No' : 'Si' }}</span>
                                        <div class="ui buttons">
                                            <a class="ui blue button" href="{{ route('receipts.edit', $row->id) }}">Editar</a>
                                            <form method="POST" action="{{ route('receipts.destroy', $row->id) }}" style="display: inline;">
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
    @include('layouts._message')
</div>
@endsection