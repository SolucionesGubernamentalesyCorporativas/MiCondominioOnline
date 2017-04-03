@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading clearfix">
        <h5 style="padding-top: 1.5px;" class="pull-left">Anuncios</h5>
        <a class="btn btn-default pull-right" href="{{ route('announcements.create') }}">Añadir anuncio</a>
    </div>
    <div class="panel-body">
        @if($data)
            <table class="table">
                <thead>
                    <tr>
                        <td>Titulo</td>
                        <td>URL</td>
                        <td>Opciones</td>
                    </tr>
                </thead>
                <tbody>
                @foreach($data as $row)   
                    <tr>
                        <td>{{ $row->title }}</td>
                        <td><a href="{{ $row->url_of_content }}">{{ $row->url_of_content }}</a></td>
                        <td>
                            <a class="btn btn-info" href="{{ route('announcements.show', $row->id) }}">Info</a>
                            <a class="btn btn-primary" href="{{ route('announcements.edit', $row->id) }}">Editar</a>
                            <form method="POST" action="{{ route('announcements.destroy', $row->id) }}" style="display: inline;">
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
@endsection