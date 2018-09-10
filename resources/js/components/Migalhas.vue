<template>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li v-for="item in lista" class="breadcrumb-item" :class="defineClass">
                <a :href="item.link">{{ item.titulo }}</a>
            </li>
        </ol>
    </nav>
</template>

<script>
    export default {
        props: [
            'lista'
        ],
        computed: {
            defineClass: function() {
                if (this.link) {
                    return 'active';
                } else {
                    return '';
                }
            }
        }
    }
</script>

<style>

</style>
