@extends('layouts.app')

@section('content')
<div class="ui container">
    <div class="row">
        <div class="column">
            <div class="ui clearing blue segment">
                <div style="position: relative; top: 8px;" class="ui left floated header">Añadir formato</div>
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
                    <div class="ten wide column">
                        <form class="ui form error" role="form" method="POST" action="{{ route('formats.store') }}">
                            {{ csrf_field() }}
                            <div class="field {{ $errors->has('name') ? 'error' : '' }}">
                                <label>Nombre</label>
                                <input type="text" name="name" value="{{ old('name') }}" placeholder="Nombre del formato">
                                @if ($errors->has('name'))
                                    <span class="ui error message">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="field {{ $errors->has('type_of_format_id') ? 'error' : '' }}">
                                <label>Tipo de formato</label>
                                <div class="ui selection dropdown">
                                    <input type="hidden" name="type_of_format_id" value="{{ old('type_of_format_id') }}">
                                    <i class="dropdown icon"></i>
                                    <div class="default text">Selecciona el tipo de formato que corresponde</div>
                                    <div class="menu">
                                        @foreach($typeOfFormats as $typeOfFormat)
                                            <div class="item" data-value="{{ $typeOfFormat->id }}">{{ $typeOfFormat->name }}</div>
                                        @endforeach
                                    </div>
                                </div>
                                @if ($errors->has('type_of_format_id'))
                                    <span class="ui error message">
                                        <strong>{{ $errors->first('type_of_format_id') }}</strong>
                                    </span>
                                @endif  
                            </div>
                            <div class="field {{ $errors->has('condo_id') ? 'error' : '' }}">
                                <label>Condominio</label>
                                <div class="ui selection dropdown">
                                    <input type="hidden" name="condo_id" value="{{ old('condo_id') }}">
                                    <i class="dropdown icon"></i>
                                    <div class="default text">Selecciona a que condominio pertenece este formato</div>
                                    <div class="menu">
                                        @foreach($condos as $condo)
                                            <div class="item" data-value="{{ $condo->id }}">{{ $condo->name }}</div>
                                        @endforeach
                                    </div>
                                </div>
                                @if ($errors->has('condo_id'))
                                    <span class="ui error message">
                                        <strong>{{ $errors->first('condo_id') }}</strong>
                                    </span>
                                @endif  
                            </div>
                            <div class="field {{ $errors->has('format') ? 'error' : '' }}">
                                <label>Formato</label>
                                <textarea id="format" name="format">{{ old('format') }}</textarea>
                                <script type="text/javascript">
                                    CKEDITOR.replace( 'format' );
                                </script>
                                @if ($errors->has('format'))
                                    <span class="ui error message">
                                        <strong>{{ $errors->first('format') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <button class="ui submit blue button" type="submit">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection