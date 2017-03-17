@extends('layouts.dashboard')
@extends('layouts.app')

@section('content')

@endsection

@section('dashboard')
<div class="col-md-8">
    <div class="panel panel-default">
        <div class="panel-heading clearfix">
            <h5 style="padding-top: 1.5px;" class="pull-left">Condominio {{ $condo->name }}</h5>
            <a class="btn btn-default pull-right" href="{{ route('condo.index') }}">Atras</a>
        </div>
        <div class="panel-body">
            <div class="list-group">
                <div class="list-group-item">ID: {{ $condo->id }}</div>
                <div class="list-group-item">Condominio: {{ $condo->name }}</div>
                <div class="list-group-item">Dirección: {{ $condo->direction }}</div>
                <div class="list-group-item">Fecha De Creación: {{ $condo->created_at }}</div>
            </div>
        </div>
    </div>
</div>
@endsection