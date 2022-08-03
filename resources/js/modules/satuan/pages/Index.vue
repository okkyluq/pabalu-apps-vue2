<template>
    <LayoutsAdminVue>
        <section class="content-header text-right">
            <button type="button" class="btn btn-success"
                @click="$store.dispatch('SatuanStoreCreate/toggleSidebar', true)"
            >
                <i class="fa fa-plus-circle"></i>
                Tambah Satuan
            </button>
        </section>
        <section class="content">
            <div class="card">
                <div class="overlay" v-if="$store.state.UI.loader">
                    <i class="fa fa-spinner faa-spin animated faa-fast" style="font-size:2em;"></i>
                </div>
                <div class="card-header">
                    <h3 class="card-title">Data Satuan</h3>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-bordered">
                        <thead class="bg-light">
                            <tr>
                                <th>Satuan</th>
                                <th>Keterangan</th>
                                <th class="text-center" width="80"><i class="fa fa-cogs"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(satuan, index) in list_satuan" :key="index">
                                <td>{{ satuan.satuan }}</td>
                                <td>{{ satuan.keterangan }}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-success" @click="editData(satuan.id)">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-danger" @click="deleteData(satuan.id)">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer text-right">
                    <b-pagination
                        :value="meta.current_page"
                        :total-rows="meta.total"
                        :per-page="meta.per_page"
                        prev-text="Prev"
                        next-text="Next"
                        @change="getListSatuan"
                    ></b-pagination>
                </div>
            </div>
        </section>
        <Create />
        <Edit />
    </LayoutsAdminVue>
</template>
<script>
import axios from '../../../config/axios'
import LayoutsAdminVue from '../../../layouts/LayoutsAdmin.vue'
import Create from './Create.vue'
import Edit from './Edit.vue'
import { mapState, mapActions } from 'vuex'
export default {
    components: {
    LayoutsAdminVue, Create, Edit
},
    methods: {
        ...mapActions('SatuanStoreIndex', {
            getListSatuan: 'getListSatuan'
        }),
        ...mapActions('SatuanStoreEdit', {
            setForm: 'setForm'
        }),
        editData(id){
            let self = this;
            this.$store.dispatch('UI/setLoader', true)
            axios.defaults.headers.common['Authorization'] = `Bearer ${this.$store.state.AUTH.token}`;
            axios.get(`satuan/${id}`)
            .then(function(response){
                self.$store.dispatch('SatuanStoreEdit/toggleSidebar', true)
                self.setForm(response.data.data)
            })
            .catch(function(error){
                console.log(error)
            })
            .finally(() => this.$store.dispatch('UI/setLoader', false));
        },
        deleteData(id){
            let self = this;
			this.$swal.fire({
				icon: 'warning',
				title: 'Apakah Anda Yakin Ingin Menghapus Satuan ?',
				showDenyButton: true,
				confirmButtonText: 'Iya, Hapus !',
				denyButtonText: `Tidak, Jangan Hapus !`,
			}).then((result) => {
				if (result.isConfirmed) {
                    this.$store.dispatch('UI/setLoader', true);
                    axios.defaults.headers.common['Authorization'] = `Bearer ${this.$store.state.AUTH.token}`;
                    axios.delete(`satuan/${id}`)
                    .then(function(response){
                        self.getListSatuan();
                        self.$swal.fire('Berhasil Menghapus !', '', 'success')
                    })
                    .catch(function(error){
                        console.log(error)
                    })
                    .finally(() => this.$store.dispatch('UI/setLoader', false));
				}
			})
        }
    },
    computed: {
        ...mapState('SatuanStoreIndex', {
            list_satuan : state => state.list_satuan,
            meta: state => state.meta,
        }),
    },
    mounted() {
        this.getListSatuan();
    },

}
</script>
