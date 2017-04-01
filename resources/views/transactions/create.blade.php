@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading clearfix">
        <h5 style="padding-top: 1.5px;" class="pull-left">Añadir transacción</h5>
        <a class="btn btn-default pull-right" href="{{ route('transactions.index') }}">Atras</a>
    </div>
    <div class="panel-body">
        <form class="form-horizontal" role="form" method="POST" action="{{ route('transactions.store') }}">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="observations" class="col-md-4 control-label">Observaciones</label>
                <div class="col-md-6">
                    <input id="observations" type="text" class="form-control" name="observations" placeholder="Escribe aqui una observacion" value="{{ old('observations') }}" autofocus>
                </div>
            </div>
            <div class="form-group">
                <label for="ammount" class="col-md-4 control-label">Cantidad</label>
                <div class="col-md-6">
                    <input id="ammount" type="number" class="form-control" name="ammount" placeholder="Digita la cantidad" value="{{ old('ammount') }}">
                </div>
            </div>
            <div class="form-group">
                <label for="verified" class="col-md-4 control-label">Verificada</label>
                <div class="col-md-6">
                    <input id="verified" type="radio" name="verified" value="0" checked> No 
                    <input id="verified" type="radio" name="verified" value="1"> Si 
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        Añadir transacción
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