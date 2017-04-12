@extends('layouts.app')

@section('content')
<div class="ui container">
    <div class="row">
        <div class="column">
            <div class="ui clearing blue segment">
                <div style="position: relative; top: 8px;" class="ui left floated header">Anuncios</div>
                <a class="ui right floated blue button" href="{{ route('announcements.create') }}">Añadir anuncio</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="column">
            @if($data)
                <table class="ui three column selectable blue table">
                    <thead>
                        <tr>
                            <th>Titulo</th>
                            <th>URL</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $row)   
                            <tr>
                                <td>{{ $row->title }}</td>
                                <td><a href="{{ $row->url_of_content }}">{{ $row->url_of_content }}</a></td>
                                <td>
                                    <div class="ui small buttons">
                                        <a class="ui green button" href="{{ route('announcements.show', $row->id) }}">Info</a>
                                        <a class="ui blue button" href="{{ route('announcements.edit', $row->id) }}">Editar</a>
                                        <form method="POST" action="{{ route('announcements.destroy', $row->id) }}" style="display: inline;">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="ui red button">Borrar</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
    @if(session('success'))
        <div class="row">
            <div class="column">
                <div class="ui success message">
                    <p>{{ session('success') }}</p>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection