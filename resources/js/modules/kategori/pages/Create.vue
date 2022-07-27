<template>
    <b-sidebar id="sidebar-1" title="Sidebar" no-close-on-esc no-close-on-backdrop backdrop bg-variant="white" backdrop-variant="dark" no-header right z-index="9999"
        @hidden="clearForm" @shown="clearForm" :visible="visible_sidebar"
    >
        <div class="card card-primary card-flat">
            <div class="card-header">
                <h3 class="card-title">Form Tambah Kategori</h3>
            </div>

            <div class="card-body">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Kategori</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" placeholder="Kategori"
                            :value="form.kategori"
                            @input="updateValueForm({
                                name : 'kategori',
                                value : $event.target.value
                            })"
                        >
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Keterangan</label>
                    <div class="col-sm-8">
                        <textarea name="" id="" rows="3" class="form-control"
                            :value="form.keterangan"
                             @input="updateValueForm({
                                name : 'keterangan',
                                value : $event.target.value
                            })"
                        ></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-8 offset-sm-3">
                        <button type="button" class="btn btn-primary btn-flat">Simpan</button>
                        <button @click="$store.dispatch('KategoriStoreCreate/toggleSidebar', false)" type="button" class="btn btn-danger btn-flat">Batal</button>
                    </div>
                </div>
            </div>
        </div>
    </b-sidebar>
</template>
<script>
import { mapActions, mapState } from 'vuex'
export default {
    computed: {
        ...mapState('KategoriStoreCreate', {
            form: state => state.form,
            visible_sidebar: state => state.visible_sidebar
        })
    },
    methods: {
        ...mapActions('KategoriStoreCreate', {
            clearForm: 'clearForm',
            updateValueForm: 'updateValueForm'
        })
    }
}
</script>
<style>
	.b-sidebar {
		width:30em !important;
	}
</style>
