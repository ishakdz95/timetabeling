<template>
    <div class="row d-flex justify-content-end">
        <div class="col-3">
            <div class="card mb-3 widget-content bg-grow-early">
                <div class="widget-content-wrapper text-white">
                    <div class="text-center">
                        <div class="widget-numbers text-white d-flex justify-content-center">
                            <a :href="url+route"> Add New </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        props : ['url' , 'route']
    }
</script>
<style scoped>

    .btn {
        align-self: end;
    }
</style>
