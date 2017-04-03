<!-- Lateral menu of our dashboard -->

<div class="ui vertical pointing menu">
    <div class="header item"><a href="{{ url('/home') }}">Panel De Control</a>
    <a href="{{ route('users.index') }}">Usuarios</a>
    <a href="{{ route('roles.index') }}">Roles</a>
    <a href="{{ route('condos.index') }}">Condominos</a>
    <a href="{{ route('estates.index') }}">Condominios</a>
    <a href="{{ route('typeoftransactions.index') }}">Tipo de Transacciones</a>
    <a href="{{ route('transactions.index') }}">Transacciones</a>
    <a href="{{ route('receipts.index') }}">Recibos</a>
    <a href="{{ route('announcements.index') }}">Anuncios</a>
</div>

