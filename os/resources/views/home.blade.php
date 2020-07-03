@extends('layouts.app')

@section('content')
    <pagina tamanho="10"> 
        <painel titulo="Dashboard">
            <migalhas v-bind:lista="{{$listaMigalhas}}"></migalhas>

                            <div class="row ">
                                <div class="col-md-111">
                                    <caixa qtd="80" titulo="Os" url="{{route('os.index')}}" cor="#90EE90" icon="ion ion-pie-graph">
                                    </caixa>
                                </div>
                                <div class="col-md-111">
                                <caixa qtd="80" titulo="Os" url="#teste1" cor="red" icon="ion ion-social-foursquare-outline">
                                    </caixa>
                                </div>
                                <div class="col-111">
                                <caixa qtd="80" titulo="Os" url="#" cor="blue" icon="ion ion-social-snapchat-outline">
                                    </caixa>
                                </div>
                            </div> 

        </painel>
    </pagina>
@endsection
