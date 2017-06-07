@extends('layouts.app')

@section('content')
<div class="ui container">
    <div class="row">
        <div class="column">
            <div class="ui clearing blue segment">
                <div style="position: relative; top: 8px;" class="ui left floated header">Formato {{ $format->typeOfFormat->name . ' ' . $format->name }}</div>
                <a class="ui right floated blue button" href="{{ url('fillformats/select') }}">
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
                        <form class="ui form" role="form" method="POST" action="{{ url('/fillformats/write/pdf', $format->id) }}">
                            {{ csrf_field() }}
                            <div class="ui dividing header">{{ $format->typeOfFormat->name . ' ' . $format->name }}</div>
                            <div class="field">
                                <textarea id="format" name="format">{{ $format->content }}</textarea>
                                <script type="text/javascript">
                                    CKEDITOR.replace( 'format' );
                                </script>
                            </div>
                            <button class="ui submit blue button" type="submit">Generar PDF</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection