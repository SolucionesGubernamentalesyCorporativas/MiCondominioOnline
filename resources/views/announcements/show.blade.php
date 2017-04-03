@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading clearfix">
        <h5 style="padding-top: 1.5px;" class="pull-left">Anuncio {{ $announcement->title }}</h5>
        <a class="btn btn-default pull-right" href="{{ route('announcements.index') }}">Atras</a>
    </div>
    <div class="panel-body">
        <ul class="list-group">
            <li class="list-group-item">ID: {{ $announcement->id }}</li>
            <li class="list-group-item">Titulo: {{ $announcement->title }}</li>
            <li class="list-group-item">URL: {{ $announcement->url_of_content }}</li>
            <li class="list-group-item">Usuario: {{ count($announcement->user_id) == 1 ? $announcement->user->name . ' ' . $announcement->user->lastname : 'Ninguno'}}</li>
            <li class="list-group-item">Fecha De Creación: {{ $announcement->created_at }}</li>
        </ul>
    </div>
</div>
@endsection