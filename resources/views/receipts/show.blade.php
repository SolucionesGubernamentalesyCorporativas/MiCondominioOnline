@extends('layouts.app')

@section('content')
<div class="ui container">
    <div class="row">
        <div class="column">
            <div class="ui clearing blue segment">
                <div style="position: relative; top: 8px;" class="ui left floated header">Recibo de la transacción "{{ $receipt->transaction->observations }}"</div>
                <a href="{{ route('receipts.index') }}" class="ui right floated blue button">
                    <i class="angle left icon"></i>
                    Atras
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="column">
            <div class="ui blue segment">
                <div class="ui relaxed divided list">
                    <div class="item">
                        <div class="content">
                            <div class="header">Fecha</div>
                            <div class="description">{{ $receipt->date->toFormattedDateString() }}</div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="content">
                            <div class="header">Monto</div>
                            <div class="description">${{ number_format($receipt->ammount, 2) }}</div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="content">
                            <div class="header">Foto del recibo</div>
                            <img src="{{ $url }}" alt="Imagen del recibo" class="ui small image">
                        </div>
                    </div>
                    <div class="item">
                        <div class="content">
                            <div class="header">Verificado</div>
                            <div class="description">{{ $receipt->verified == 0 ? 'No' : 'Si' }}</div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="content">
                            <div class="header">Transacción</div>
                            <div class="description">{{ count($receipt->transaction) == 1 ? $receipt->transaction->observations : 'Ninguna' }}</div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="content">
                            <div class="header">Fecha de creación</div>
                            <div class="description">{{ $receipt->created_at != NULL ? $receipt->created_at->diffForHumans() : 'No registrado' }}</div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="content">
                            <div class="header">Ultima actualización</div>
                            <div class="description">{{ $receipt->updated_at != NULL ? $receipt->updated_at->diffForHumans() : 'El registro no ha sido actualizado' }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection