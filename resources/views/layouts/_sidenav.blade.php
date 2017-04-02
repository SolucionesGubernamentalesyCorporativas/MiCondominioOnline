<!-- Lateral menu of our dashboard -->

<div class="panel panel-default">
    <div class="panel-heading"><a href="{{ url('/home') }}">Panel De Control</a></div>
    <div class="panel-body">
        <div class="panel-title">Bienvenido!</div>
        <ul class="list-group">
            <li class="list-group-item"><a href="{{ route('users.index') }}">Usuarios</a></li>
            <li class="list-group-item"><a href="{{ route('roles.index') }}">Roles</a></li>
            <li class="list-group-item"><a href="{{ route('condos.index') }}">Condominos</a></li>
            <li class="list-group-item"><a href="{{ route('estates.index') }}">Condominios</a></li>
            <li class="list-group-item"><a href="{{ route('typeoftransactions.index') }}">Tipo de Transacciones</a></li>
            <li class="list-group-item"><a href="{{ route('transactions.index') }}">Transacciones</a></li>
            <li class="list-group-item"><a href="{{ route('receipts.index') }}">Recibos</a></li>
        </ul>
    </div>
</div>
