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
                <div class="header">Balance : 
                    @if($debt >=0)
                        <span class="ui tag label green"> $ {{number_format($debt),2}} </span>
                    @else

                    <span class="ui tag label red "> -$ {{number_format(abs($debt),2)}}</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="column">
            @if (count($user->estates) >= 1)
                <table class="ui six column structured blue table">
                    <thead>
                        <tr>
                            <th>Tipo de transacción</th>
                            <th>Transacción</th>
                            <th>Cantidad</th>
                            <th>Pago verificado</th>
                            <th>Recibo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user->estates as $estate)
                            <tr > <th colspan ="5" class="active" >{{$estate->typeOfEstate->name }} {{$estate->number}}</th> </tr>
                            @foreach ($estate->transactions as $transaction)
                                    <tr>
                                        <td>{{ $transaction->typeoftransaction->name }}</td>
                                        <td>{{ $transaction->observations }}</td>
                                        <td>${{ number_format($transaction->ammount, 2) }}</td>
                                        
                                        @if(count($transaction->receipt)>0)
                                            <td> si {{count($transaction->receipt)}} </td>
                                        @else
                                            <td> no </td>
                                        @endif 
                                        <td></td>
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