@extends('layouts.app')

@section('content')
<div class="ui container">
    <div class="row">
        <div class="column">
            <div class="ui clearing blue segment">
                <div style="position: relative; top: 8px;" class="ui left floated header">Estado financiero</div>
                <a class="ui right floated blue button" href="{{ url('/financial/consult/pdf') }}">Generar PDF</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="column">
            @if(count($user->transactions) >= 1)
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
                        @foreach($user->transactions as $transaction)
                            @if($transaction->verified == 1)
                                <tr>
                                    <td>{{ $transaction->observations }}</td>
                                    <td>${{ number_format($transaction->ammount, 2) }}</td>
                                    <td>{{ $transaction->verified == 0 ? 'No' : 'Si' }}</td>
                                    <td>{{ $transaction->typeoftransaction->name }}</td>
                                    <td>{{ $transaction->typeoftransaction->income_outcome == 0 ? 'Ingreso' : 'Gasto' }}</td>
                                    <td>{{ $transaction->receipt->name_of_img }}</td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            @else
                <h3>Ninguna transacción relacionada con el usuario</h3>
            @endif
        </div>
    </div>
</div>

@endsection