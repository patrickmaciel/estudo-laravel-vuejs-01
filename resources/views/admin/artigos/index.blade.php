@extends('layouts.app')

@section('content')
    <pagina tamanho="10">
        <painel titulo="Lista de Artigos">
            <migalhas :lista="{{$listaMigalhas}}"></migalhas>

            <tabela-lista
                criar="{{ route('artigos.create') }}"
                editar="#editar"
                deletar="#deletar"
                detalhe="#detalhe"
                ordem="asc" ordemCol="2"
                token="{{ csrf_token() }}"
                :titulos="['#', 'Título', 'Descrição']"
                :itens="[[1, 'PHP OO', 'Curso de PHP OO'],[2, 'Vue JS', 'Curso de Vue JS']]"
            ></tabela-lista>
        </painel>
    </pagina>
@endsection
