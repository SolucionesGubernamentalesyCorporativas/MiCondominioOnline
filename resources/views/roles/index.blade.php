@extends('layouts.app')

@section('content')
<div class="ui segments">
    <div class="ui clearing segment">
        <div style="padding-top: 3.5px;" class="ui left floated header">Roles</div>
        <a class="ui right floated blue button" href="{{ route('roles.create') }}">Añadir rol</a>
    </div>
    <div class="ui segment">
        @if($data)
            <table class="ui two column selectable blue table">
                <thead>
                    <tr>
                        <th>Rol</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($data as $row)   
                    <tr>
                        <td>{{ $row->name }}</td>
                        <td>
                            <div class="ui buttons">
                                <a class="ui green button" href="{{ route('roles.show', $row->id) }}">Info</a>
                                <a class="ui blue button" href="{{ route('roles.edit', $row->id) }}">Editar</a>
                                <form method="POST" action="{{ route('roles.destroy', $row->id) }}" style="display: inline;">
                                    {{ method_field('DELETE')}}
                                    {{ csrf_field() }}
                                    <button type="submit" class="ui red button">Borrar</button>
                                </form> 
                            </div>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        @endif
    </div>
</div>
@endsection