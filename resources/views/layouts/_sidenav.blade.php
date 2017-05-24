<!-- Lateral menu of our dashboard -->

<div class="ui vertical secondary pointing fluid blue menu">
    <div class="header item">Panel de control</div>
    <a href="{{ url('/home') }}" class="{{ Request::is('home') ? 'item active' : 'item' }}">Inicio</a>
    <a href="{{ route('users.index') }}" class="{{ Request::is('users*') ? 'item active' : 'item' }}">Usuarios</a>
    <a href="{{ route('transactions.index') }}" class="{{ Request::is('transactions*') ? 'item active' : 'item' }}">Transacciones</a>
    <a href="{{ route('condos.index') }}" class="{{ Request::is('condos*') ? 'item active' : 'item' }}">Condominios</a>
    <a href="{{ route('estates.index') }}" class="{{ Request::is('estates*') ? 'item active' : 'item' }}">Unidades privativas</a>
    <a href="{{ route('visitors.index') }}" class="{{ Request::is('visitors*') ? 'item active' : 'item' }}">Visitantes</a>
    <a href="{{ route('announcements.index') }}" class="{{ Request::is('announcements*') ? 'item active' : 'item' }}">Anuncios</a>
    <a href="{{ route('resources.index') }}" class="{{ Request::is('resources*') ? 'item active' : 'item' }}">Recursos</a>
    <a href="{{ route('incidences.index') }}" class="{{ Request::is('incidences*') ? 'item active' : 'item' }}">Incidencias</a>
    <a href="{{ url('billing/consult') }}" class="{{ Request::is('billingstatements*') ? 'item active' : 'item' }}">Estado de cuenta</a>
    <a href="{{ url('financial/consult') }}" class="{{ Request::is('financialstatements*') ? 'item active' : 'item' }}">Estado financiero</a>
</div>

