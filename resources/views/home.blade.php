@extends('layouts.app')

@section('content')
    <pagina tamanho="10">
        <painel titulo="Dashboard">
            <div class="row">
                <div class="col">
                    <caixa qtd="58" titulo="Visitas" url="http://www.google.com" cor="green" icone="fa fa-code"></caixa>
                </div>

                <div class="col">
                    <caixa qtd="152" titulo="Inadimplentes" url="http://fast.com" cor="#ffe000" icone="fa fa-user"></caixa>
                </div>

                <div class="col">
                    <caixa qtd="8" titulo="Multas" url="http://www.patrickmaciel.com" cor="red" icone="fa fa-code"></caixa>
                </div>
            </div>
        </painel>
    </pagina>
@endsection
