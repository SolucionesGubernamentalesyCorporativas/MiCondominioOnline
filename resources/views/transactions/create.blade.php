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

            <div class="form-group{{ $errors->has('observations') ? ' has-error' : '' }}">
                <label for="observations" class="col-md-4 control-label">Observaciones</label>

                <div class="col-md-6">
                    <input id="observations" type="text" class="form-control" name="observations" value="{{ old('observations') }}" required autofocus>

                    @if ($errors->has('observations'))
                        <span class="help-block">
                            <strong>{{ $errors->first('observations') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('ammount') ? ' has-error' : '' }}">
                <label for="ammount" class="col-md-4 control-label">Cantidad</label>

                <div class="col-md-6">
                    <input id="ammount" type="text" class="form-control" name="ammount" value="{{ old('ammount') }}" required autofocus>

                    @if ($errors->has('ammount'))
                        <span class="help-block">
                            <strong>{{ $errors->first('ammount') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('verified') ? ' has-error' : '' }}">
                <label for="verified" class="col-md-4 control-label">Verificada</label>

                <div class="col-md-6">
                    <input id="verified" type="checkbox" class="form-control" name="verified" value="1" required autofocus>

                    @if ($errors->has('verified'))
                        <span class="help-block">
                            <strong>{{ $errors->first('verified') }}</strong>
                        </span>
                    @endif
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
    </div>
</div>         
@endsection