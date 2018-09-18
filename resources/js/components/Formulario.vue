<template>
    <form :action="action" :class="classe || 'form'" :method="defineMethod" :enctype="encytpe || 'multipart/form-data'" :styles="styles">
        <input type="hidden" name="_token" :value="token">
        <input v-if="alterMethod" type="hidden" name="_method" :value="alterMethod">

        <slot></slot>
    </form>
</template>

<script>
    export default {
        props: [
            'action',
            'classe',
            'method',
            'encytpe',
            'styles',
            'token'
        ],
        data: function() {
            return {
                alterMethod: ""
            }
        },
        computed: {
            defineMethod: function() {
                if (this.method.toLowerCase() == 'post' || this.method.toLowerCase() == 'get') {
                    return this.method.toLowerCase();
                } else if (this.method.toLowerCase() == 'put') {
                    this.alterMethod = 'put';
                } else if (this.method.toLowerCase() == 'put') {
                    this.alterMethod = 'delete';
                }

                return "post";
            }
        }
    }
</script>

<style>

</style>
