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
                <div class="ui blue segment">
                    <div class="ui two cards">
                        @foreach($data as $row)
                            <div class="card">
                                <div class="content">
                                    <div class="header">{{ $row->title }}</div>
                                    <div class="description">{{ $row->content }}</div>
                                </div>
                                <div class="extra content">
                                    <div class="ui two buttons">
                                        <a class="ui green basic button" href="{{ route('announcements.edit', $row->id) }}">Editar</a>
                                        <form id="destroy_{{ $row->id }}" method="POST" action="{{ route('announcements.destroy', $row->id) }}">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                        </form>
                                        <button form="destroy_{{ $row->id }}" type="submit" class="ui red basic button">Borrar</button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
    {{ $data->links() }}
    @include('layouts._success')
</div>
@endsection