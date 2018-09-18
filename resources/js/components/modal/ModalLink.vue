<template>
    <span>
        <span v-if="item">
            <button v-on:click="preencheFormulario()" v-if="!tipo || (tipo != 'button' && tipo != 'link')" type="button" class="btn" :class="classe || 'btn-primary'" data-toggle="modal" :data-target="nome">
                {{ titulo }}
            </button>

            <button v-on:click="preencheFormulario()" v-if="tipo == 'button'" type="button" class="btn" :class="classe || 'btn-primary'" data-toggle="modal" :data-target="nome">
                {{ titulo }}
            </button>

            <a v-on:click="preencheFormulario()" v-if="tipo == 'link'" href="#" class="" :class="classe" data-toggle="modal" :data-target="nome">
                {{ titulo }}
            </a>
        </span>

        <span v-if="!item">
            <button v-if="!tipo || (tipo != 'button' && tipo != 'link')" type="button" class="btn" :class="classe || 'btn-primary'" data-toggle="modal" :data-target="nome">
                {{ titulo }}
            </button>

            <button v-if="tipo == 'button'" type="button" class="btn" :class="classe || 'btn-primary'" data-toggle="modal" :data-target="nome">
                {{ titulo }}
            </button>

            <a v-if="tipo == 'link'" href="#" class="" :class="classe" data-toggle="modal" :data-target="nome">
                {{ titulo }}
            </a>
        </span>

    </span>
</template>

<script>
    export default {
        props: [
            'nome',
            'tipo',
            'titulo',
            'classe',
            'item'
        ],
        methods: {
            preencheFormulario: function() {
                this.$store.commit('setItem', this.item);
            }
        }
    }
</script>

<style>

</style>
