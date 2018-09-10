<template>
    <form :action="action" :class="classe || 'form'" :method="method" :enctype="encytpe || 'multipart/form-data'" :style="style">
        <input v-if="method != 'post' && method != 'get'" type="hidden" name="_token" value="">
        <input type="hidden" name="_method" value="">

        <slot></slot>
    </form>
</template>

<script>
    export default {
        props: [
            'action',
            'class',
            'method',
            'encytpe',
            'style',
            'token'
        ]
    }
</script>

<style>

</style>
