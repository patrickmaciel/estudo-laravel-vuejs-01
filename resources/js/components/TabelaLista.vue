<template>
    <div>
        <div class="form-inline justify-content-between no-gutters">
            <div class="col-6">
                <modal-link v-if="criar" tipo="link" classe="btn-info" titulo="Criar" nome="#artigo-modal"></modal-link>
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

                    <a v-if="detalhe" :href="detalhe">Ver |</a>
                    <a v-if="editar" :href="editar">Editar |</a>
                    <a v-if="deletar && token" :href="deletar" v-on:click="executaForm(index)">Excluir</a>
                </td>
            </tr>
            </tbody>
        </table>

        <modal nome="artigo-modal">
            <form>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </modal>
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
            'ordemCol'
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
                        if (a[ordemCol] > b[ordemCol]) {
                            return 1;
                        } else if (a[ordemCol] < b[ordemCol]) {
                            return -1;
                        }
                        return 0;
                    });
                } else {
                    this.itens.sort(function(a, b) {
                        if (a[ordemCol] < b[ordemCol]) {
                            return 1;
                        } else if (a[ordemCol] > b[ordemCol]) {
                            return -1;
                        }
                        return 0;
                    });
                }

                return this.itens.filter(res => {
                    for (let k = 0; k < res.length; k++) {
                        if ((res[k] + '').toLowerCase().indexOf(this.buscar.toLowerCase()) >= 0) {
                            return true;
                        }
                    }

                    return false;
                });
            }
        }
    }
</script>

<style>
    .vue-table tr th {
        cursor: pointer;
    }
</style>
