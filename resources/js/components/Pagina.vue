<template>
    <div class="container">
        <div class="row justify-content-center">
            <div :class="defineTamanho">
                <slot></slot>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:['tamanho'],
        computed: {
            defineTamanho: function() {
                if (this.tamanho >= 12) {
                    return "col-md-12";
                } else if (this.tamanho <= 2) {
                    return "col-md-2";
                } else if ((this.tamanho % 2) == 0) {
                    return "col-md-" + this.tamanho;
                } else {
                    return "col-md-" + (parseInt(this.tamanho) + 1);
                }

            }
        }
    }
</script>
