@extends('layouts.app')

@section('content')
  <pagina tamanho="12">
    <painel titulo="Ordem de Serviços">

      <p>
        <form class="form-inline text-center" action="{{ route('site') }}" method="get">
          <input type="search" class="form-control" name="busca" placeholder="Buscar" value="{{ isset($busca) ? $busca : "" }}">
          <button class="btn btn-info">Buscar</button>

        </form>
      </p>

      <div class="row">
        
        @foreach ($lista as $key => $value)
            
          <oscard 
          titulo="{{str_limit($value->titulo,8,"...") }}" 
          descricao="{{str_limit($value->descricao,10,"...") }}" 
          link="{{ route('os',[$value->id,str_slug($value->titulo)]) }}" 
          imagem="https://cnts.org.br/wp-content/uploads/2018/06/411-945x462.jpg"
          data="{{ $value->data_inicio }}"
          autor="{{ strtoupper($value->name) }}"  
          sm="4"
          md="2"  
          >
        </oscard>

        @endforeach
        
      </div>
      <div align="center">
        {{$lista}}
      </div>

    </painel>
    

  </pagina>
@endsection
