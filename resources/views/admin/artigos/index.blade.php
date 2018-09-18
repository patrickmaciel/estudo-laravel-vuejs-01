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
                :itens="{{ $listaArtigos }}"
                modal="sim"
            ></tabela-lista>
        </painel>
    </pagina>

    <modal nome="modal-adicionar">
        <painel titulo="Novo Artigo">
            <formulario classe="" action="#" method="put" encytpe="" token="{{ csrf_token() }}">
                <div class="form-group">
                    <label for="titulo">Título</label>
                    <input type="text" class="form-control" id="titulo" aria-describedby="tituloHelp" placeholder="Digite o título">
                    <small id="tituloHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>

                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <input type="text" class="form-control" id="descricao" aria-describedby="descricaoHelp" placeholder="Digite a Descrição">
                    <small id="descricaoHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>

                <button type="submit" class="btn btn-info">Adicionar</button>
            </formulario>
        </painel>
    </modal>

    <modal nome="modal-editar">
        <painel titulo="Editar Artigo">
            <formulario classe="" action="#" method="put" encytpe="" token="{{ csrf_token() }}">
                <div class="form-group">
                    <label for="titulo">Título</label>
                    <input type="text" class="form-control" id="titulo" v-model="$store.state.item.titulo" aria-describedby="tituloHelp" placeholder="Digite o título">
                    <small id="tituloHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>

                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <input type="text" class="form-control" id="descricao" v-model="$store.state.item.descricao" aria-describedby="descricaoHelp" placeholder="Digite a Descrição">
                    <small id="descricaoHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>

                <button type="submit" class="btn btn-info">Adicionar</button>
            </formulario>
        </painel>
    </modal>

    <modal nome="modal-detalhe">
        <painel :titulo="$store.state.item.titulo">
            <p>@{{ $store.state.item.descricao }}</p>
        </painel>
    </modal>
@endsection
