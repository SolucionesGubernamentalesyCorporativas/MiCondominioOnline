@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading clearfix">
        <h5 style="padding-top: 1.5px;" class="pull-left">Añadir anuncio</h5>
        <a class="btn btn-default pull-right" href="{{ route('announcements.index') }}">Atras</a>
    </div>
    <div class="panel-body">
        <form class="form-horizontal" role="form" method="POST" action="{{ route('announcements.store') }}">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="title" class="col-md-4 control-label">Titulo del anuncio</label>
                <div class="col-md-6">
                    <input id="title" type="text" class="form-control" name="title" placeholder="Ejemplo: Junta Mensual" value="{{ old('title') }}" autofocus>
                </div>
            </div>
            <div class="form-group">
                <label for="url_of_content" class="col-md-4 control-label">Dirección web</label>
                <div class="col-md-6">
                    <input id="url_of_content" type="url" class="form-control" name="url_of_content" placeholder="Copia y pega la dirección web del anuncio" value="{{ old('url_of_content') }}">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        Añadir anuncio
                    </button>
                </div>
            </div>
        </form>
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</div>                
@endsection