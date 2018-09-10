<template>
    <div class="action-buttons">
        <!-- Button trigger modal -->
        <button v-if="!tipo || (tipo != 'button' && tipo != 'link')" type="button" class="btn" :class="classe || 'btn-primary'" data-toggle="modal" :data-target="nome">
            {{ titulo }}
        </button>

        <button v-if="tipo == 'button'" type="button" class="btn" :class="classe || 'btn-primary'" data-toggle="modal" :data-target="nome">
            {{ titulo }}
        </button>

        <a v-if="tipo == 'link'" href="#" class="btn" :class="classe || 'btn-primary'" data-toggle="modal" :data-target="nome">
            {{ titulo }}
        </a>
    </div>
</template>

<script>
    export default {
        props: [
            'nome',
            'tipo',
            'titulo',
            'classe'
        ]
    }
</script>

<style>

</style>
