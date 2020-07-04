@extends('layouts.app')

@section('content')
  <pagina tamanho="10">

    @if($errors->all())
      <div class="alert alert-danger alert-dismissible text-center" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        @foreach ($errors->all() as $key => $value)
          <li><strong>{{$value}}</strong></li>
        @endforeach
      </div>
    @endif

    <painel titulo="Lista de Ordem de Serviços">
      <migalhas v-bind:lista="{{$listaMigalhas}}"></migalhas>



      <tabela-lista
      v-bind:titulos="['#','Título','Descrição','Autor','Data Inicio', 'Data Final','Imagens']"
      v-bind:itens="{{json_encode($listaOs)}}"
      ordem="desc" ordemcol="1"
      criar="#criar" detalhe="/admin/os/" editar="/admin/os/" deletar="/admin/os/" token="{{ csrf_token() }}"
      modal="sim"
      user_id="{{ auth()->user()->id }}"
      ></tabela-lista>

      <div align="center">
       {{ ($listaOs) }}
      </div>

    </painel>

  </pagina>

  <modal nome="adicionar" titulo="Adicionar" >
    
    <formulario id="formAdicionar" css=""  action="{{route('os.store')}}" method="post" enctype="multipart/form-data" token="{{ csrf_token() }}">

      <div class="form-group">
        <label for="user_id">OS Resposável :  {{ strtoupper(auth()->user()->name) }} </label>
        <input type="hidden" class="form-control" id="user_id" name="user_id" placeholder="user_id" value="{{ auth()->user()->id }}">
      </div>

      <div class="form-group">
        <label for="titulo">Título</label>
        <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Título" value="{{old('titulo')}}">
      </div>
      <div class="form-group">
        <label for="descricao">Descrição</label>
        <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Descrição" value="{{old('descricao')}}">
      </div>

      <div class="form-group">
        <label for="conteudo">Conteúdo</label>
        <textarea class="form-control" id="conteudo" name="conteudo" >{{old('conteudo')}}</textarea>
      </div>

      <div class="form-group">
        <label for="image">Imagem</label>     
        <input type="file" class="form-control-file" id="image" name="image">
      </div>

      <div class="form-group">
        <label for="data_inicio">Data Inicial</label>
        <input type="date" class="form-control" id="data_inicio" name="data_inicio" v-model="$store.state.item.data_inicio">
      </div>

      <div class="form-group">
        <label for="data_final">Data Final Estimada</label>
        <input type="date" class="form-control" id="data_final" name="data_final" v-model="$store.state.item.data_final">
      </div>

      

    </formulario>
    <span slot="botoes">
      <button form="formAdicionar" class="btn btn-info">Adicionar</button>
    </span>

  </modal>

  <modal nome="editar" titulo="Editar">
    <formulario id="formEditar" v-bind:action="'/admin/os/' + $store.state.item.id" method="put" enctype="multipart/form-data" token="{{ csrf_token() }}">

      <div class="form-group">
        <label for="titulo">Título</label>
        <input type="text" class="form-control" id="titulo" name="titulo" v-model="$store.state.item.titulo" placeholder="Título">
      </div>
      <div class="form-group">
        <label for="descricao">Descrição</label>
        <input type="text" class="form-control" id="descricao" name="descricao" v-model="$store.state.item.descricao" placeholder="Descrição">
      </div>
      <div class="form-group">
        <label for="conteudo">Conteúdo</label>
        <textarea class="form-control" id="conteudo" name="conteudo" v-model="$store.state.item.conteudo" ></textarea>
      </div>


      <div class="form-group">
        <label for="data_inicio">Data Inicial</label>
        <input type="date" class="form-control" id="data_inicio" name="data_inicio" v-model="$store.state.item.data_inicio">
      </div>

      <div class="form-group">
        <label for="'data'_final">Data Final Estimada</label>
        <input type="date" class="form-control" id="data_final" name="data_final" v-model="$store.state.item.data_final">
      </div>

    </formulario>
    <span slot="botoes">
      <button form="formEditar" class="btn btn-info">Atualizar</button>
    </span>
  </modal>


  <div class="center" align="center">
{{-- 
    {{dd(json_encode($listaOs->image))}} --}}

  <modal nome="detalhe" v-bind:titulo="$store.state.item.titulo">    


      <h4>@{{$store.state.item.descricao}}</h4>
      <p>@{{$store.state.item.conteudo}}</p> 
      <img v-bind:src="'http://127.0.0.1:8000/storage/' + $store.state.item.image" alt="" width="200px">

            

    </modal>
  </div>

@endsection
