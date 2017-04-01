@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading clearfix">
        <h5 style="padding-top: 1.5px;" class="pull-left">Añadir Condomino</h5>
        <a class="btn btn-default pull-right" href="{{ route('condos.index') }}">Atras</a>
    </div>
    <div class="panel-body">
        <form class="form-horizontal" role="form" method="POST" action="{{ route('condos.store') }}">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name" class="col-md-4 control-label">Nombre del condomino</label>
                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="name" placeholder="Nombre y apellido paterno" value="{{ old('name') }}" autofocus>
                </div>
            </div>
            <div class="form-group">
                <label for="direction" class="col-md-4 control-label">Dirección</label>
                <div class="col-md-6">
                    <input id="direction" type="text" class="form-control" name="direction" placeholder="Dirección completa" value="{{ old('direction') }}">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        Añadir condomino
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