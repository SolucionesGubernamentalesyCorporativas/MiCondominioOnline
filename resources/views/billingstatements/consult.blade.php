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
                            <th>Tipo de transacción</th>
                            <th>Ingreso o gasto</th>
                            <th>Pago verificado</th>
                            <th>Recibo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user->estates as $estate)
                            @foreach ($estate->transactions as $transaction)
                                @foreach ($transaction->receipt as $receipt)
                                    <tr>
                                        <td>{{ $transaction->observations }}</td>
                                        <td>${{ number_format($receipt->ammount, 2) }}</td>
                                        <td>{{ $transaction->typeoftransaction->name }}</td>
                                        <td>{{ $transaction->typeoftransaction->income_outcome == 0 ? 'Ingreso' : 'Gasto' }}</td>
                                        @if (count($receipt) >= 1)
                                            <td>{{ $receipt->verified == 0 ? 'No' : 'Si' }}</td>
                                            <td><img src="{{ $urls[$receipt->receiptImage->id] }}" alt="foto-recibo-{{ $transaction->observations }}" class="ui small image"></td>
                                        @else
                                            <td>No hay un recibo asociado</td>
                                            <td>No hay una imagen del recibo asociada</td>
                                        @endif
                                    </tr>
                                @endforeach
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