@extends('layouts.app')

@section('content')
<div class="ui container">
    <div class="row">
        <div class="column">
            <div class="ui clearing blue segment">
                <div style="position: relative; top: 8px;" class="ui left floated header">Tipo de transacción {{ $typeoftransaction->name }}</div>
                <a href="{{ route('typeoftransactions.index') }}" class="ui right floated blue button">Atras</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="column">
            <div class="ui blue segment">
                <div class="ui relaxed divided list">
                    <div class="item">
                        <div class="content">
                            <div class="header">Nombre</div>
                            <div class="description">{{ $typeoftransaction->name }}</div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="content">
                            <div class="header">Ingreso o gasto</div>
                            <div class="description">{{ $typeoftransaction->income_outcome == 0 ? 'Ingreso' : 'Gasto' }}</div>
                        </div>
                    </div>
                     <div class="item">
                        <div class="content">
                            <div class="header">Transacciones</div>
                            @if(count($typeoftransaction->transactions) >= 1)
                                <div class="description">Transacciones asociadas al tipo de transacción</div>
                                <div class="list">
                                    @foreach($typeoftransaction->transactions as $transaction)
                                        <div class="item">
                                            <div class="description">{{ $transaction->observations }}</div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="description">Ninguna transacción asociada al tipo de transacción</div>
                            @endif
                        </div>
                    </div>
                    <div class="item">
                        <div class="content">
                            <div class="header">Fecha de creación</div>
                            <div class="description">{{ $typeoftransaction->created_at != NULL ? $typeoftransaction->created_at->diffForHumans() : 'No registrado' }}</div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="content">
                            <div class="header">Ultima actualización</div>
                            <div class="description">{{ $typeoftransaction->updated_at != NULL ? $typeoftransaction->updated_at->diffForHumans() : 'El registro no ha sido actualizado' }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection