<template>
    <LayoutsAdminVue>
        <section class="content-header text-right">
            <button type="button" class="btn btn-success"
                @click="$store.dispatch('KategoriStoreCreate/toggleSidebar', true)"
            >
                <i class="fa fa-plus-circle"></i>
                Tambah Kategori
            </button>
        </section>
        <section class="content">
            <div class="card">
                <div class="overlay" v-if="$store.state.UI.loader">
                    <i class="fa fa-spinner faa-spin animated faa-fast" style="font-size:2em;"></i>
                </div>
                <div class="card-header">
                    <h3 class="card-title">Daftar Kategori</h3>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-bordered">
                        <thead class="bg-light">
                            <tr>
                                <th width="10">No.</th>
                                <th>Kategori</th>
                                <th>Keterangan</th>
                                <th width="120" class="text-center">Created By</th>
                                <th width="80" class="text-center">
                                    <i class="fa fa-cogs"></i>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(list, index) in list_kategori" :key="index">
                                <td class="text-center">{{ index+1 }}</td>
                                <td>{{ list.kategori }}</td>
                                <td>{{ list.keterangan }}</td>
                                <td class="text-center">{{ list.created_by.name }}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-success">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-danger" @click="deleteData(list.id)">
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
                        @change="getListKategori"
                    ></b-pagination>
                </div>
            </div>
        </section>
        <Create />
    </LayoutsAdminVue>
</template>
<script>
import LayoutsAdminVue from '../../../layouts/LayoutsAdmin.vue'
import Create from './Create.vue';
import { mapActions, mapState } from 'vuex'
export default {
    components: {
        LayoutsAdminVue, Create
    },
    data() {
        return {

        }
    },
    methods: {
        ...mapActions('KategoriStoreIndex', {
            getListKategori : 'getListKategori'
        }),
        deleteData(id){
            console.log(id)
        }
    },
    computed: {
        ...mapState('KategoriStoreIndex', {
            list_kategori: state => state.list_kategori,
            meta: state => state.meta
        })
    },
    mounted(){
        this.getListKategori();
    }
}
</script>
