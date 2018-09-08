<template>
    <div class="card card-default" :class="defineCor">
        <div class="card-header">{{ titulo }}</div>

        <div class="card-body">
            <slot></slot>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            titulo: String,
            cor: String,
        },
        computed: {
            defineCor: function() {
                return 'bg-' + (this.cor || 'light')
            },
        }
    }
</script>

<style>
    .bg-orange {
        background-color: #ff9900!important;
    }
</style>
