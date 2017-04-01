@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading clearfix">
        <h5 style="padding-top: 1.5px;" class="pull-left">Añadir tipo de transacción</h5>
        <a class="btn btn-default pull-right" href="{{ route('typeoftransactions.index') }}">Atras</a>
    </div>
    <div class="panel-body">
        <form class="form-horizontal" role="form" method="POST" action="{{ route('typeoftransactions.store') }}">
            {{ csrf_field() }}
             <div class="form-group">
                <label for="name" class="col-md-4 control-label">Nombre</label>
                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="name" placeholder="Ejemplo: Pago de luz" value="{{ old('name') }}" autofocus>
                </div>
            </div>
            <div class="form-group">
                <label for="income_outcome" class="col-md-4 control-label">Ingreso o Gasto</label>
                <div class="col-md-6">
                    <input id="income_outcome" type="radio" name="income_outcome" value="0" checked> Ingreso
                    <input id="income_outcome" type="radio" name="income_outcome" value="1"> Gasto  
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        Añadir tipo de transacción
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