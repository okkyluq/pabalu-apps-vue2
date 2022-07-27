<template>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="#" class="brand-link">
            <!-- <img src="pabalu.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
            <span class="brand-text font-weight-light text-center">
                <img src="pabalu.png" alt="" class="" style="width:180px;">
            </span>
        </a>

        <div class="sidebar">
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="https://adminlte.io/themes/v3/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">Alexander Pierce</a>
                </div>
            </div>

            <nav class="mt-2">
                <NavigationMenu />
            </nav>
        </div>
    </aside>
</template>
<script>
import NavigationMenu from './NavigationMenu.vue'
export default {
    components: {
        NavigationMenu
    }
}
</script>
<style>

</style>
