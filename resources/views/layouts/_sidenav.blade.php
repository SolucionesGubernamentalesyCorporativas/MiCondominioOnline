<!-- Lateral menu of our dashboard -->

<div class="ui vertical secondary pointing fluid blue menu">
    <div class="header item">Panel de control</div>
    <a href="{{ url('/home') }}" class="{{ Request::is('home') ? 'item active' : 'item' }}">Inicio</a>
    <a href="{{ route('users.index') }}" class="{{ Request::is('users*') ? 'item active' : 'item' }}">Usuarios</a>
    <a href="{{ route('roles.index') }}" class="{{ Request::is('roles*') ? 'item active' : 'item' }}">Roles</a>
    <a href="{{ route('condos.index') }}" class="{{ Request::is('condos*') ? 'item active' : 'item' }}">Condominos</a>
    <a href="{{ route('estates.index') }}" class="{{ Request::is('estates*') ? 'item active' : 'item' }}">Condominios</a>
    <a href="{{ route('typeoftransactions.index') }}" class="{{ Request::is('typeoftransactions*') ? 'item active' : 'item' }}">Tipo de transacción</a>
    <a href="{{ route('transactions.index') }}" class="{{ Request::is('transactions*') ? 'item active' : 'item' }}">Transacción</a>
    <a href="{{ route('receipts.index') }}" class="{{ Request::is('receipts*') ? 'item active' : 'item' }}">Recibos</a>
    <a href="{{ route('announcements.index') }}" class="{{ Request::is('announcements*') ? 'item active' : 'item' }}">Anuncios</a>
    <a href="{{ route('typeofvisitors.index') }}" class="{{ Request::is('typeofvisitors*') ? 'item active' : 'item' }}">Tipo de visitante</a>
    <a href="{{ route('visitors.index') }}" class="{{ Request::is('visitors*') ? 'item active' : 'item' }}">Visitantes</a>

    <a href="{{ route('typeofresources.index') }}" class="{{ Request::is('typeofresources*') ? 'item active' : 'item' }}">Tipo de recurso</a>
</div>

