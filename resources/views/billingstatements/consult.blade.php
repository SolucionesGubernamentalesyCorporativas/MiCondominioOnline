@extends('layouts.app')

@section('content')
<div class="ui container">
    <div class="row">
        <div class="column">
            <div class="ui clearing blue segment">
                <div style="position: relative; top: 8px;" class="ui left floated header">Estado de cuenta</div>
                <a class="ui right floated blue button" href="{{ url('/billing/consult/pdf') }}">Generar PDF</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="column">
            <div class="ui blue segment">
                <div class="header">Pago esperado : ${{ $debt }}</div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="column">
            @if (count($user->estates) >= 1)
                <table class="ui six column selectable blue table">
                    <thead>
                        <tr>
                            <th>Transacción</th>
                            <th>Cantidad</th>
                            <th>Pago verificado</th>
                            <th>Tipo de transacción</th>
                            <th>Ingreso o gasto</th>
                            <th>Recibo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user->estates as $estate)
                            @foreach ($estate->transactions as $transaction)
                                <tr>
                                    <td>{{ $transaction->observations }}</td>
                                    <td>${{ number_format($transaction->ammount, 2) }}</td>
                                    <td>{{ $transaction->receipt->verified == 0 ? 'No' : 'Si' }}</td>
                                    <td>{{ $transaction->typeoftransaction->name }}</td>
                                    <td>{{ $transaction->typeoftransaction->income_outcome == 0 ? 'Ingreso' : 'Gasto' }}</td>
                                    <td><img src="{{ $urls[$transaction->receipt->id] }}" alt="foto-recibo-{{ $transaction->observations }}" class="ui small image"></td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="ui blue segment">
                    <div class="header">No hay transacciones asociadas con el usuario</div>
                </div>
            @endif
        </div>
    </div>
</div>

@endsection