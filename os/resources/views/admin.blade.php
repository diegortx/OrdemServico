@extends('layouts.app')

@section('content')

  <pagina tamanho="10">
    <painel titulo="Dashboard">
      <migalhas v-bind:lista="{{$listaMigalhas}}"></migalhas>

      <div class="row">
        @can('eAutor')
          <div class="col-md-4">
            <caixa qtd="{{ $totalOs }}" titulo="Ordem de Serviços" url="{{route('os.index')}}" cor="orange" icone="ion ion-pie-graph"></caixa>
          </div>
        @endcan

        @can('eAdmin')       
          <div class="col-md-4">
            <caixa qtd="{{ $totalUsuarios }}" titulo="Usuários" url="{{route('usuarios.index')}}" cor="blue" icone="ion ion-person-stalker"></caixa>
          </div>
          {{-- <div class="col-md-4">
            <caixa qtd="{{ $totalAutores }}" titulo="Autores" url="{{route('autores.index')}}" cor="red" icone="ion ion-person"></caixa>
          </div> --}}
          <div class="col-md-4">
            <caixa qtd="{{ $totalAdmin }}" titulo="Administradores" url="{{route('adm.index')}}" cor="green" icone="ion ion-person"></caixa>
          </div>
      </div>
      @endcan
        
       
    </painel>

  </pagina>
@endsection
