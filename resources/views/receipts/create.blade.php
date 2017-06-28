@extends('layouts.app')

@section('scripts')

<script>
    $('#condominio').dropdown({
        onChange: function(value, text, choice){
            $( "#estates" ).addClass("loading");
            $.get( "/ajax/estatesCondo",{id:value} ,function(data) {
                //alert( JSON.stringify(data) );
                $.each(data, function(i, item) {
                    //alert(item.id);
                    var string = '<div class="item" data-value="'+item.id+'">'+item.name+' '+item.number+'</div>';	
                    $( "#estatesOp" ).append( string  );
                    $( "#estates" ).removeClass("loading");
                    $( "#estates" ).removeClass("disabled");
                    
                });
            });
        }
    });

    $('#estates').dropdown({
        onChange: function(value, text, choice){
            $( "#transactions" ).addClass("disabled");
            $( "#transactions" ).addClass("loading");
            $( "#transactionsOp" ).html("");
            //alert(value);
            $.get( "/ajax/transactionEstate",{id:value} ,function(data) {
                //alert( JSON.stringify(data) );
                if ( data.length == 0 ) {
                    //alert("NO DATA!");
                    $( "#transactions" ).removeClass("loading");
                    $("#transNo").popup('show');
                    setTimeout(function(){ $("#transNo").popup('hide'); }, 3000);
                }else{
                    $.each(data, function(i, item) {
                        //alert(item.id);
                        var string = '<div class="item" data-value="'+item.id+'">'+item.name+' - '+item.observations+'</div>';	
                        $( "#transactionsOp" ).append( string  );
                        $( "#transactions" ).removeClass("loading");
                        $( "#transactions" ).removeClass("disabled");
                        
                    });
                }
                
            })
        }
    });

    $('#transactions').dropdown();

    

    $('.ui.checkbox')
        .checkbox()
    ;

</script>

@endsection

@section('content')
<div class="ui container">
    <div class="row">
        <div class="column">
            <div class="ui clearing blue segment">
                <div style="position: relative; top: 8px;" class="ui left floated header">Añadir recibo</div>
                <a class="ui right floated blue button" href="{{ route('receipts.index') }}">
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
                        <form class="ui form error" role="form" method="POST" action="{{ route('receipts.store') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="field {{ $errors->has('transaction_id') ? 'error' : '' }}">
                                <label>Condominio</label>
                                <div id="condominio" class="ui selection dropdown">
                                    <input type="hidden" name="transaction_id" value="{{ old('transaction_id') }}">
                                    <i class="dropdown icon"></i>
                                    <div class="default text">Selecciona un condominio</div>
                                    <div class="menu">
                                        @foreach(Auth::user()->condos as $condo)
                                            <div class="item" data-value="{{ $condo->id }}">{{ $condo->name }}</div>
                                        @endforeach
                                    </div>
                                </div>
                                @if ($errors->has('transaction_id'))
                                    <span class="ui error message">
                                        <strong>{{ $errors->first('transaction_id') }}</strong>
                                    </span>
                                @endif  
                            </div>
                            <div class="field {{ $errors->has('estate_id') ? 'error' : '' }}">
                                <label>Unidad privativa</label>
                                <div id="estates" class="ui selection disabled dropdown">
                                    <input type="hidden" name="estate_id" value="{{ old('estate_id') }}">
                                    <i class="dropdown icon"></i>
                                    <div class="default text">Selecciona la unidad privativa asociada al recibo</div>
                                    <div id="estatesOp" class="menu">      
                                    </div>
                                </div>
                                @if ($errors->has('estate_id'))
                                    <span class="ui error message">
                                        <strong>{{ $errors->first('estate_id') }}</strong>
                                    </span>
                                @endif  
                            </div>
                            <div class="field {{ $errors->has('transaction_id') ? 'error' : '' }}">
                                <label>Transacción</label>
                                <div id="transactions" class="ui selection disabled dropdown">
                                    <input type="hidden" name="transaction_id" value="{{ old('transaction_id') }}">
                                    <i class="dropdown icon"></i>
                                    <div id="transNo" class="default text" data-position="right center" data-content="no hay transacciones disponibles" >Selecciona una transacción asociada al recibo</div>
                                    <div id="transactionsOp" class="menu">
                                    </div>
                                </div>
                                @if ($errors->has('transaction_id'))
                                    <span class="ui error message">
                                        <strong>{{ $errors->first('transaction_id') }}</strong>
                                    </span>
                                @endif  
                            </div>
                            <div class="field {{ $errors->has('date') ? 'error' : '' }}">
                                <label>Fecha</label>
                                <input type="date" name="date" max="{{ date('Y-m-d') }}">
                                @if ($errors->has('date'))
                                    <span class="ui error message">
                                        <strong>{{ $errors->first('date') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="field {{ $errors->has('ammount') ? 'error' : '' }}">
                                <label>Monto</label>
                                <input type="text" name="ammount" placeholder="Digita el total del recibo">
                                @if ($errors->has('ammount'))
                                    <span class="ui error message">
                                        <strong>{{ $errors->first('ammount') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="field {{ $errors->has('photo') ? 'error' : '' }}">
                                <label>Sube una foto del recibo</label>
                                <input type="file" name="photo">
                                @if ($errors->has('photo'))
                                    <span class="ui error message">
                                        <strong>{{ $errors->first('photo') }}</strong>
                                    </span>
                                @endif
                            </div>
                            
                            
                            <div class="inline fields {{ $errors->has('verified') ? 'error' : '' }}">
                                <label for="verified">¿El recibo fue verificado por un administrador?</label>
                                <div class="field">
                                    <div class="ui toggle checkbox">
                                        <input id="verified" type="checkbox" name="verified" value="1">
                                    </div>
                                </div>
                                @if ($errors->has('verified'))
                                    <span class="ui error message">
                                        <strong>{{ $errors->first('verified') }}</strong>
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