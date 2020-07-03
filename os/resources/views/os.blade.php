@extends('layouts.app')

@section('content')
  <pagina tamanho="12">
    <painel>
      
      <h2  align="center"> Titulo: {{ $os->titulo }}</h2>
      <h4 align="center">Descrição: {{ $os->descricao }}</h4>
      <p>
        Conteudo: {{$os->conteudo}}
      </p>
      <p align="center">
        <small>Por: {{ strtoupper($os->user->name) }} - Telefone: {{ $os->user->telefone }} - Data de Inicio: {{date('d/m/Y',strtotime( $os->data_inicio ))}} - Data de Finalização: {{date('d/m/Y',strtotime( $os->data_final ))}}</small>
      </p>


    </painel>
    

  </pagina>
@endsection
