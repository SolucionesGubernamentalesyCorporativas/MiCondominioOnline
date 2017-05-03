<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body>
    <h1>Estado financiero</h1>
    <h2>{{ $user->name . ' ' . $user->lastname}}</h2>
    <p><small>{{ $user->email }}</small></p>
    @foreach($user->estates as $estate)
        <em>{{ $estate->number }}</em><br>
    @endforeach
    <hr>
     @if(count($user->transactions) >= 1)
        <table>
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
</body>
</html>