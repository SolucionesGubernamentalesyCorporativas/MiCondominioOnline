@extends('layouts.app')

@section('content')
<div class="ui container">
    <div class="row">
        <div class="column">
            <div class="ui clearing blue segment">
                <div style="position: relative; top: 8px;" class="ui left floated header">Transacción {{ $transaction->observations }}</div>
                <a href="{{ route('transactions.index') }}" class="ui right floated blue button">
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
                            <div class="header">Tipo de transacción</div>
                            <div class="description">{{ count($transaction->typeOfTransaction) == 1 ? $transaction->typeOfTransaction->name : 'Ninguno' }}</div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="content">
                            <div class="header">Observaciones</div>
                            <div class="description">{{ $transaction->observations }}</div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="content">
                            <div class="header">Cantidad</div>
                            <div class="description">${{ number_format($transaction->ammount, 2) }}</div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="content">
                            <div class="header">Verificada</div>
                            <div class="description">{{ $transaction->verified == 0 ? 'No' : 'Si' }}</div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="content">
                            <div class="header">Recibo</div>
                            <div class="description">{{ count($transaction->receipt) == 1 ? $transaction->receipt->name_of_img : 'Ninguno' }}</div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="content">
                            <div class="header">Casas</div>
                            @if(count($transaction->estates) >= 1)
                                <div class="description">Casas asociadas a la transacción</div>
                                <div class="list">
                                    @foreach($transaction->estates as $estate)
                                        <div class="item">
                                            <div class="description">{{ $estate->typeOfEstate->name . ' ' . $estate->number }}</div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="description">Ninguna casa asociada a la transacción</div>
                            @endif
                        </div>
                    </div>
                    <div class="item">
                        <div class="content">
                            <div class="header">Fecha de creación</div>
                            <div class="description">{{ $transaction->created_at != NULL ? $transaction->created_at->diffForHumans() : 'No registrado' }}</div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="content">
                            <div class="header">Ultima actualización</div>
                            <div class="description">{{ $transaction->updated_at != NULL ? $transaction->updated_at->diffForHumans() : 'El registro no ha sido actualizado' }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection