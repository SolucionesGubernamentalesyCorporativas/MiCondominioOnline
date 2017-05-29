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
            <div class="ui blue segment">
                @if($data)
                    <div class="ui divided items">
                        @foreach($data as $row)
                            <div class="item">
                                <div class="content">
                                    <div class="header"><a href="{{ route('announcements.show', $row->id) }} ">{{ $row->title }}</a></div>
                                    <div class="description">{{ $row->description }}</div>
                                    <div class="extra">
                                        <div class="ui small buttons">
                                            <a class="ui blue button" href="{{ route('announcements.edit', $row->id) }}">Editar</a>
                                            <form method="POST" action="{{ route('announcements.destroy', $row->id) }}" style="display: inline;">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="ui red button">Borrar</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
    {{ $data->links() }}
    @include('layouts._message')
</div>
@endsection