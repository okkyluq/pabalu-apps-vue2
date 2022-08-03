<template>
    <LayoutsAdminVue>
        <section class="content-header text-right">
            <button type="button" class="btn btn-success"
                @click="$store.dispatch('DatamenuStoreCreate/toggleSidebar', true)"
            >
                <i class="fa fa-plus-circle"></i>
                Tambah Menu
            </button>
        </section>
        <section class="content">
            <div class="card">
                <div class="overlay" v-if="$store.state.UI.loader">
                    <i class="fa fa-spinner faa-spin animated faa-fast" style="font-size:2em;"></i>
                </div>
                <div class="card-header">
                    <h3 class="card-title">Data Menu</h3>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-bordered">
                        <thead class="bg-light">
                            <tr>
                                <th width="10">No.</th>
                                <th>Text Menu</th>
                                <th>URL Menu</th>
                                <th width="120" class="text-center">Icon</th>
                                <th width="120" class="text-center">Active</th>
                                <th width="120" class="text-center">Created By</th>
                                <th width="80" class="text-center">
                                    <i class="fa fa-cogs"></i>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(list, index) in list_menu" :key="index">
                                <td class="text-center">{{ index+1 }}</td>
                                <td>{{ list.text_menu }}</td>
                                <td>{{ list.url }}</td>
                                <td class="text-center"><i :class="list.icon"></i></td>
                                <td class="text-center">
                                    <span type="button" class="btn btn-success btn-xs" v-if="list.active === 'true'"><i class="fa-solid fa-toggle-on"></i> Active</i></span>
                                    <span type="button" class="btn btn-danger btn-xs" v-else><i class="fa-solid fa-toggle-off"></i> Nonactive</i></span>
                                </td>
                                <td class="text-center">{{ list.created_by.name }}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-success">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-danger">
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
                        @change="getListMenu"
                    ></b-pagination>
                </div>
            </div>
        </section>
        <Create />
    </LayoutsAdminVue>
</template>
<script>
import { mapState, mapActions } from 'vuex'
import Create from './Create.vue';
import LayoutsAdminVue from '../../../layouts/LayoutsAdmin.vue'
export default {
    components: {
        LayoutsAdminVue, Create
    },
    data() {
        return {

        }
    },
    computed:{
        ...mapState('DatamenuStoreIndex', {
            list_menu: state => state.list_menu,
            meta: state => state.meta
        })
    },
    methods: {
        ...mapActions('DatamenuStoreIndex', {
            getListMenu: 'getListMenu'
        })
    },
    mounted() {
        // this.redirectIfNotAcces('view_data_menu')
        this.getListMenu();
    },
}
</script>
<style lang="">

</style>
