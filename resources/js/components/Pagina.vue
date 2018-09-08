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
                    console.log('>= 12');
                    return "col-md-12";
                } else if (this.tamanho <= 2) {
                    console.log('<= 2');
                    return "col-md-2";
                } else if ((this.tamanho % 2) == 0) {
                    console.log('PAR');
                    return "col-md-" + this.tamanho;
                } else {
                    console.log('IMPAR');
                    return "col-md-" + (parseInt(this.tamanho) + 1);
                }

            }
        }
    }
</script>
