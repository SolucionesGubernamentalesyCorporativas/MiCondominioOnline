@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading clearfix">
        <h5 style="padding-top: 1.5px;" class="pull-left">Añadir condominio</h5>
        <a class="btn btn-default pull-right" href="{{ route('estates.index') }}">Atras</a>
    </div>
    <div class="panel-body">
        <form class="form-horizontal" role="form" method="POST" action="{{ route('estates.store') }}">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="number" class="col-md-4 control-label">Numero</label>
                <div class="col-md-6">
                    <input id="number" type="numeric" class="form-control" name="number" placeholder="Ejemplo: Blvd. Centro Sur #120" value="{{ old('number') }}" autofocus>
                </div>
            </div>
            <div class="form-group">
                <label for="rented" class="col-md-4 control-label">Rentado</label>
                <div class="col-md-6">
                    <input id="rented" type="radio" name="rented" value="0" checked> No
                    <input id="rented" type="radio" name="rented" value="1"> Si  
                </div>
            </div>
            <div class="form-group">
                <label for="number_of_parking_lots" class="col-md-4 control-label">Lugares de estacionamiento</label>
                <div class="col-md-6">
                    <input id="number_of_parking_lots" type="numeric" class="form-control" name="number_of_parking_lots" placeholder="¿Cuantos lugares de estacionamiento tiene?" value="{{ old('number_of_parking_lots') }}">
                </div>
            </div>
            <div class="form-group">
                <label for="notes" class="col-md-4 control-label">Notas</label>
                <div class="col-md-6">
                    <input id="notes" type="text" class="form-control" name="notes" placeholder="Agrega alguna nota" value="{{ old('notes') }}">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        Añadir condominio
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