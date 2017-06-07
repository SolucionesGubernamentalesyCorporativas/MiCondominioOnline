@extends('layouts.app')

@section('content')
<div class="ui container">
    <div class="row">
        <div class="column">
            <div class="ui clearing blue segment">
                <div style="position: relative; top: 8px;" class="ui left floated header">Elige un formato para llenar</div>
                <a class="ui right floated blue button" href="{{ route('formats.index') }}">
                    <i class="angle left icon"></i>
                    Atras
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="column">
            <div class="ui blue segment">
                <div class="ui centered grid">
                    <div class="nine wide column">
                        <form class="ui form" role="form" method="POST" action="{{ url('/fillformats/write') }}">
                            {{ csrf_field() }}
                            <div class="eight wide field">
                                <label>Formato</label>
                                <div class="ui selection dropdown">
                                    <input type="hidden" name="format_id" value="{{ old('format_id') }}">
                                    <i class="dropdown icon"></i>
                                    <div class="default text">Selecciona el formato a llenar</div>
                                    <div class="menu">
                                        @foreach($formats as $format)
                                            <div class="item" data-value="{{ $format->id }}">{{ $format->condo->name . ' - ' . $format->typeOfFormat->name . ' ' . $format->name }}</div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <button class="ui submit blue button" type="submit">Llenar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection