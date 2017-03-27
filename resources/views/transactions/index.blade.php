@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading clearfix">
        <h5 style="padding-top: 1.5px;" class="pull-left">Transacciones</h5>
        <a class="btn btn-default pull-right" href="{{ route('transactions.create') }}">Añadir transacción</a>
    </div>
    <div class="panel-body">
        @if($data)
            <table class="table">
                <thead>
                    <tr>
                        <td>Observaciones</td>
                        <td>Cantidad</td>
                        <td>Verificada</td>
                        <td>Opciones</td>
                    </tr>
                </thead>
                <tbody>
                @foreach($data as $row)   
                    <tr>
                        <td>{{ $row->observations }}</td>
                        <td>{{ $row->ammount }}</td>
                        <td>{{ $row->verified }}</td>
                        <td>
                            <a class="btn btn-info" href="{{ route('transactions.show', $row->id) }}">Info</a>
                            <a class="btn btn-primary" href="{{ route('transactions.edit', $row->id) }}">Editar</a>
                            <form method="POST" action="{{ route('transactions.destroy', $row->id) }}" style="display: inline;">
                                {{ method_field('DELETE')}}
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger">Borrar</button>
                            </form>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        @endif
    </div>
</div>
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@endsection