@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading clearfix">
        <h5 style="padding-top: 1.5px;" class="pull-left">Editar condominio {{ $estate->name }}</h5>
        <a class="btn btn-default pull-right" href="{{ route('estates.index') }}">Atras</a>
    </div>
    <div class="panel-body">
        <form class="form-horizontal" role="form" method="POST" action="{{ route('estates.update', $estate->id) }}">
            {{ method_field('PUT') }}
            {{ csrf_field() }}
            <div class="form-group">
                <label for="number" class="col-md-4 control-label">Numero</label>
                <div class="col-md-4">
                    <input id="number" type="text" class="form-control" name="number" placeholder="{{ $estate->number }}" value="{{ old('number') }}" autofocus>
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
        <form class="form-horizontal" role="form" method="POST" action="{{ route('estates.update', $estate->id) }}">
            {{ method_field('PUT') }}
            {{ csrf_field() }}
            <div class="form-group">
                <label for="rented" class="col-md-4 control-label">Rentado</label>
                <div class="col-md-4">
                    <input id="rented" type="radio" name="rented" checked> No
                    <input id="rented" type="radio" name="rented"> Si
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
        <form class="form-horizontal" role="form" method="POST" action="{{ route('estates.update', $estate->id) }}">
            {{ method_field('PUT') }}
            {{ csrf_field() }}
            <div class="form-group">
                <label for="number_of_parking_lots" class="col-md-4 control-label">Lugares de estacionamiento</label>
                <div class="col-md-4">
                    <input id="number_of_parking_lots" type="numeric" class="form-control" name="number_of_parking_lots" placeholder="{{ $estate->number_of_parking_lots }}" value="{{ old('number_of_parking_lots') }}">
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
        <form class="form-horizontal" role="form" method="POST" action="{{ route('estates.update', $estate->id) }}">
            {{ method_field('PUT') }}
            {{ csrf_field() }}
            <div class="form-group">
                <label for="notes" class="col-md-4 control-label">Lugares de estacionamiento</label>
                <div class="col-md-4">
                    <input id="notes" type="text" class="form-control" name="notes" placeholder="{{ $estate->notes }}" value="{{ old('notes') }}">
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