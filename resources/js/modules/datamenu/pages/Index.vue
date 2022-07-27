<template>
    <LayoutsAdminVue>
        <section class="content-header"></section>
        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Menu</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    Start creating your amazing application!
                </div>
                <div class="card-footer">
                    <div class="btn-group">
                        <button type="button" class="btn btn-default">Previous</button>
                        <button type="button" class="btn btn-info">1</button>
                        <button type="button" class="btn btn-default">2</button>
                        <button type="button" class="btn btn-default">3</button>
                        <button type="button" class="btn btn-default">4</button>
                        <button type="button" class="btn btn-default">Next</button>
                    </div>
                </div>
            </div>
        </section>
    </LayoutsAdminVue>
</template>
<script>
import LayoutsAdminVue from '../../../layouts/LayoutsAdmin.vue'
export default {
    components: {
        LayoutsAdminVue
    }
}
</script>
<style lang="">

</style>
