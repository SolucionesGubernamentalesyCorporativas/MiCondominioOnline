@extends('layouts.app')

@section('content')
<div class="ui container">
    <div class="row">
        <div class="column">
            <div class="ui clearing blue segment">
                <div style="position: relative; top: 8px;" class="ui left floated header">Estado financiero  {{$debt}}</div>
                <a class="ui right floated blue button" href="{{ url('/financial/consult/pdf') }}">Generar PDF</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="column">
            
        </div>
    </div>
</div>

@endsection