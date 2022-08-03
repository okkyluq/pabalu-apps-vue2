<template>
    <div class="hold-transition sidebar-mini" :class="{'sidebar-collapse' : !$store.state.UI.sidebar_active}">
        <div class="wrapper">
            <Navbar />
            <Aside />
            <div class="content-wrapper">
                <slot></slot>
            </div>
            <Footer />
        </div>
    </div>
</template>
<script>
import Navbar from '../partials/Navbar.vue'
import Aside from '../partials/Aside.vue'
import Footer from '../partials/Footer.vue'
export default {
    components: {
        Navbar, Aside, Footer
    },
}
</script>
