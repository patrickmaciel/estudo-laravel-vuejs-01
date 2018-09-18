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
                :titulos="['#', 'Título', 'Descrição', 'Data']"
                :itens="{{ $listaArtigos }}"
                modal="sim"
            ></tabela-lista>
        </painel>
    </pagina>

    <modal nome="modal-adicionar" titulo="Adicionar">
        <formulario id="form-adicionar" classe="" action="{{ route('artigos.store') }}" method="post" encytpe="" token="{{ csrf_token() }}">
            <div class="form-group">
                <label for="titulo">Título</label>
                <input type="text" class="form-control" id="titulo" name="titulo" aria-describedby="tituloHelp" placeholder="Digite o título">
                <small id="tituloHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>

            <div class="form-group">
                <label for="descricao">Descrição</label>
                <input type="text" class="form-control" id="descricao" name="descricao" aria-describedby="descricaoHelp" placeholder="Digite a Descrição">
                <small id="descricaoHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>

            <div class="form-group">
                <label for="conteudo">Conteúdo</label>
                <textarea class="form-control" name="conteudo" id="conteudo" cols="30" rows="3"></textarea>
            </div>

            <div class="form-group">
                <label for="data">Data</label>
                <input type="datetime-local" id="data" class="form-control" name="data">
            </div>
        </formulario>

        <span slot="botoes">
            <button form="form-adicionar" type="submit" class="btn btn-success">Adicionar</button>
        </span>

    </modal>

    <modal nome="modal-editar" titulo="Editar">
        <formulario id="form-editar" classe="" action="#" method="put" encytpe="" token="{{ csrf_token() }}">
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
        </formulario>

        <span slot="botoes">
            <button type="submit" class="btn btn-primary">Editar</button>
        </span>
    </modal>

    <modal nome="modal-detalhe" :titulo="$store.state.item.titulo">
        <p>@{{ $store.state.item.descricao }}</p>
    </modal>
@endsection
