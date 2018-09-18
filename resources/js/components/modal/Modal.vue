<template>
    <!-- Modal -->
    <div class="modal fade" :id="nome" tabindex="-1" role="dialog" :aria-labelledby="nome" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <slot></slot>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: [
            'nome'
        ]
    }
</script>

<style>

</style>
