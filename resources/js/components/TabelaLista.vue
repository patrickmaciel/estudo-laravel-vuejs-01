<template>
    <div>
        <div class="form-inline justify-content-between no-gutters">
            <div class="col-6">
                <a v-if="criar && !modal" :href="criar" class="btn btn-primary">Criar</a>
                <modal-link v-if="criar && modal" tipo="link" classe="" titulo="Criar" nome="#modal-adicionar"></modal-link>
            </div>

            <form action="#" class="col-3" method="GET">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Digite aqui" v-model="buscar">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button">Buscar</button>
                    </div>
                </div>
            </form>
        </div>

        <table class="vue-table table table-striped table-hover">
            <thead>
            <tr>
                <th v-on:click="ordenaColuna(index)" v-for="(titulo, index) in titulos">{{ titulo }}</th>
                <th v-if="detalhe || editar || deletar">Ação</th>
            </tr>
            </thead>

            <tbody>
            <tr v-for="(row, index) in lista">
                <td v-for="value in row">{{ value }}</td>

                <td v-if="detalhe || editar || deletar">
                    <form v-if="deletar && token" :id="index" :action="deletar" method="POST">
                        <input type="hidden" name="_token" :value="token">
                        <input type="hidden" name="_method" value="DELETE">
                    </form>

                    <a v-if="detalhe && !modal" :href="detalhe">Detalhe |</a>
                    <modal-link v-if="detalhe && modal" :item="row" tipo="link" classe="" titulo="Detalhe |" nome="#modal-detalhe"></modal-link>

                    <a v-if="editar && !modal" :href="editar">Editar |</a>
                    <modal-link v-if="editar && modal" :item="row" tipo="link" classe="" titulo="Editar |" nome="#modal-editar"></modal-link>

                    <a v-if="deletar && token" :href="deletar" v-on:click="executaForm(index)">Excluir</a>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        props:[
            'criar',
            'editar',
            'deletar',
            'detalhe',
            'token',
            'titulos',
            'itens',
            'ordem',
            'ordemCol',
            'modal'
        ],
        data: function() {
          return {
              buscar: '',
              ordemAux: this.ordem || 'asc',
              ordemAuxCol: this.ordemCol || 0
          }
        },
        methods: {
            executaForm: function(index) {
                document.getElementById(index).submit();
            }
            ,ordenaColuna: function(coluna) {
                this.ordemAuxCol = coluna;
                if (this.ordemAux.toLowerCase() == 'asc') {
                    this.ordemAux = 'desc';
                } else {
                    this.ordemAux = 'asc';
                }
            }
        },
        computed: {
            lista: function() {
                let ordem = this.ordemAux;
                let ordemCol = this.ordemAuxCol;

                ordem = ordem.toLowerCase();
                ordemCol = parseInt(ordemCol);

                if (ordem == 'asc') {
                    this.itens.sort(function(a, b) {
                        if (Object.values(a)[ordemCol] > Object.values(b)[ordemCol]) {
                            return 1;
                        } else if (Object.values(a)[ordemCol] < Object.values(b)[ordemCol]) {
                            return -1;
                        }
                        return 0;
                    });
                } else {
                    this.itens.sort(function(a, b) {
                        if (Object.values(a)[ordemCol] < Object.values(b)[ordemCol]) {
                            return 1;
                        } else if (Object.values(a)[ordemCol] > Object.values(b)[ordemCol]) {
                            return -1;
                        }
                        return 0;
                    });
                }

                if (this.buscar) {
                    return this.itens.filter(res => {
                        for (let k = 0; k < res.length; k++) {
                            if ((res[k] + '').toLowerCase().indexOf(this.buscar.toLowerCase()) >= 0) {
                                return true;
                            }
                        }

                        return false;
                    });
                }

                return this.itens;
            }
        }
    }
</script>

<style>
    .vue-table tr th {
        cursor: pointer;
    }
</style>
