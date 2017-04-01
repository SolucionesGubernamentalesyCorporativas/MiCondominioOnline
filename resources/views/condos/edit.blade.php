@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading clearfix">
        <h5 style="padding-top: 1.5px;" class="pull-left">Editar condomino {{ $condo->name }}</h5>
        <a class="btn btn-default pull-right" href="{{ route('condos.index') }}">Atras</a>
    </div>
    <div class="panel-body">
        <form class="form-horizontal" role="form" method="POST" action="{{ route('condos.update', $condo->id) }}">
            {{ method_field('PUT') }}
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name" class="col-md-4 control-label">Condomino</label>
                <div class="col-md-4">
                    <input id="name" type="text" class="form-control" name="name" placeholder="{{ $condo->name }}" value="{{ old('name') }}">
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
        <form class="form-horizontal" role="form" method="POST" action="{{ route('condos.update', $condo->id) }}">
            {{ method_field('PUT') }}
            {{ csrf_field() }}
            <div class="form-group">
                <label for="direction" class="col-md-4 control-label">Dirección</label>
                <div class="col-md-4">
                    <input id="direction" type="text" class="form-control" name="direction" placeholder="{{ $condo->direction }}" value="{{ old('direction') }}">
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
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