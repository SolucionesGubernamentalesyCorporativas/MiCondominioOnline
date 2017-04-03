@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading clearfix">
        <h5 style="padding-top: 1.5px;" class="pull-left">Añadir recibo</h5>
        <a class="btn btn-default pull-right" href="{{ route('receipts.index') }}">Atras</a>
    </div>
    <div class="panel-body">
        <form class="form-horizontal" role="form" method="POST" action="{{ route('receipts.store') }}">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="date" class="col-md-4 control-label">Fecha</label>
                <div class="col-md-4">
                    <input id="date" type="date" class="form-control" name="date" value="{{ old('date') }}">
                </div>
            </div>
            <div class="form-group">
                <label for="name_of_img" class="col-md-4 control-label">Nombre de la imagen</label>
                <div class="col-md-6">
                    <input id="name_of_img" type="text" class="form-control" name="name_of_img" placeholder="Escribe una descripción pequeña" value="{{ old('name_of_img') }}">
                </div>
            </div>
            <div class="form-group">
                <label for="type_of_img" class="col-md-4 control-label">Tipo de imagen</label>
                <div class="col-md-6">
                    <input id="type_of_img" type="text" class="form-control" name="type_of_img" placeholder="Recibo, factura, nota" value="{{ old('type_of_img') }}">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        Añadir recibo
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