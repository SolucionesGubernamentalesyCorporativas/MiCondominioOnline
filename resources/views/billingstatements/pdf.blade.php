<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body>
    <h1>Estado de cuenta</h1>
    <h2>{{ $user->name . ' ' . $user->lastname}}</h2>
    <p><small>{{ $user->email }}</small></p>
    @foreach($user->estates as $estate)
        <span>{{ $estate->condo->name }}</span>
        <em>{{ $estate->typeOfEstate->name . ' ' . $estate->number }}</em><br>
    @endforeach
    <hr>
     @if(count($user->estates) >= 1)
        <table>
            <thead>
                <tr>
                    <th>Transacción</th>
                    <th>Cantidad</th>
                    <th>Tipo de transacción</th>
                    <th>Ingreso o gasto</th>
                </tr>
            </thead>
            <tbody>
                @foreach($user->estates as $estate)
                    @foreach ($estate->transactions as $transaction)
                        <tr>
                            <td>{{ $transaction->observations }}</td>
                            <td>${{ number_format($transaction->ammount, 2) }}</td>
                            <td>{{ $transaction->typeoftransaction->name }}</td>
                            <td>{{ $transaction->typeoftransaction->income_outcome == 0 ? 'Ingreso' : 'Gasto' }}</td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
    @else
        <h3>Ninguna transacción relacionada con el usuario</h3>
    @endif
    <h3>Pago esperado: ${{ $debt }}</h3>
</body>
</html>