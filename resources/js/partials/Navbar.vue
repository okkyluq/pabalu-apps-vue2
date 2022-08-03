<template>
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="#" @click.prevent="$store.dispatch('UI/minimizeSidebar')"><i class="fas fa-bars"></i></a>
            </li>
        </ul>
    </nav>
</template>
<script>
export default {
    mounted() {
        window.$('[data-widget="pushmenu"]').on('click', function(){
            // alert('as')
        });
    },
}
</script>
<style>

</style>
