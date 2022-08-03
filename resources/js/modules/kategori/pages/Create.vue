<template>
    <b-sidebar id="sidebar-1" title="Sidebar" no-close-on-esc no-close-on-backdrop backdrop bg-variant="white" backdrop-variant="dark" no-header right z-index="9999"
        @hidden="clearForm" @shown="clearForm" :visible="visible_sidebar"
        width="40em"
    >
        <div class="card card-primary card-flat">
            <div class="overlay" v-if="$store.state.UI.loader">
                <i class="fa fa-spinner faa-spin animated faa-fast" style="font-size:2em;"></i>
            </div>
            <div class="card-header">
                <h3 class="card-title">Form Tambah Kategori</h3>
            </div>

            <div class="card-body">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Kategori</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" placeholder="Kategori"
                            :class="{'is-invalid' : errors.kategori}"
                            :value="form.kategori"
                            @input="updateValueForm({
                                name : 'kategori',
                                value : $event.target.value
                            })"
                        >
                        <span class="error invalid-feedback" v-if="errors.kategori">{{ errors.kategori[0]  }}</span>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Keterangan</label>
                    <div class="col-sm-8">
                        <textarea name="" id="" rows="3" class="form-control"
                            :class="{'is-invalid' : errors.keterangan}"
                            :value="form.keterangan"
                             @input="updateValueForm({
                                name : 'keterangan',
                                value : $event.target.value
                            })"
                        ></textarea>
                        <span class="error invalid-feedback" v-if="errors.keterangan">{{ errors.keterangan[0]  }}</span>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-8 offset-sm-3">
                        <button type="button" class="btn btn-primary btn-flat" @click="sendForm">Simpan</button>
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
    data() {
        return {
            errors: {}
        }
    },
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
        }),
        sendForm(){
            this.errors = {}
            let formData = {
                kategori: this.form.keterangan,
                keterangan: this.form.keterangan
            }
            this.$store.dispatch('UI/setLoader', true);
            this.$axios.defaults.headers.common['Authorization'] = `Bearer ${this.$store.state.AUTH.token}`;
			this.$axios.post('kategori', formData)
				.then(response => {
                    if(response.status === 200){
                        this.$store.dispatch('KategoriStoreCreate/toggleSidebar', false);
                        this.$store.dispatch('KategoriStoreIndex/getListKategori');
                    }
				})
				.catch(error => {
					this.errors = error.response.data.errors;
					console.log(error);
				})
				.finally(() => this.$store.dispatch('UI/setLoader', false));
        }
    }
}
</script>
