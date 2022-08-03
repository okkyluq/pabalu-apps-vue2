<template>
    <LayoutsAdminVue>
        <section class="content-header"></section>
        <section class="content">
            <div class="card">
                <div class="overlay" v-if="$store.state.UI.loader">
                    <i class="fa fa-spinner faa-spin animated faa-fast" style="font-size:2em;"></i>
                </div>
                <div class="card-header">
                    <h3 class="card-title">Otoritas Menu</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-success" :disabled="role_id === ''" @click="updateOtoritasMenu">
                            <i class="fa-solid fa-floppy-disk"></i> Update Otoritas Menu
                        </button>
                    </div>
                </div>
                <div class="card-body">

                    <div class="col-sm-12">
                        <div class="row mb-4">
                            <label class="col-sm-1 col-form-label text-end">Pilih Role :</label>
                            <div class="col-sm-3">
                                <select class="form-control" v-model="role_id"
                                    @change="getOtoritasByRole($event.target.value)"
                                >
                                    <option value="" selected="">Silahkan Pilih</option>
                                    <option v-for="role in all_role" :key="role.id" :value="role.id">
                                        {{ role.name }}
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <table class="table table-bordered">
                            <thead class="table-dark">
                                <tr>
                                    <th>Nama Menu</th>
                                    <th width="120" class="text-center">View</th>
                                    <th width="120" class="text-center">Create</th>
                                    <th width="120" class="text-center">Edit</th>
                                    <th width="120" class="text-center">Delete</th>
                                    <th width="120" class="text-center">Export</th>
                                    <th width="120" class="text-center">Import</th>
                                </tr>
                            </thead>
                            <tbody>
                                <template v-for="menu in all_menu">
                                    <tr :key="menu.id">
                                        <td>
                                            <strong><i :class="menu.icon"></i> {{ menu.text_menu }}</strong>
                                        </td>
                                        <td class="text-center">
                                            <b-form-checkbox v-if="menu.otoritas_menu.view == 'true'"
                                                :checked="menu_checked['view_'+menu.SlugMenu]"
                                                @change="updateRoleMenu({
                                                    menu : 'view_'+menu.SlugMenu,
                                                    value : $event
                                                })"
                                            />
                                        </td>
                                        <td class="text-center">
                                            <b-form-checkbox v-if="menu.otoritas_menu.create == 'true'"
                                                :checked="menu_checked['create_'+menu.SlugMenu]"
                                                @change="updateRoleMenu({
                                                    menu : 'create_'+menu.SlugMenu,
                                                    value : $event
                                                })"
                                            />
                                        </td>
                                        <td class="text-center">
                                            <b-form-checkbox v-if="menu.otoritas_menu.edit == 'true'"
                                                :checked="menu_checked['edit_'+menu.SlugMenu]"
                                                @change="updateRoleMenu({
                                                    menu : 'edit_'+menu.SlugMenu,
                                                    value : $event
                                                })"
                                            />
                                        </td>
                                        <td class="text-center">
                                            <b-form-checkbox v-if="menu.otoritas_menu.delete == 'true'"
                                                :checked="menu_checked['delete_'+menu.SlugMenu]"
                                                @change="updateRoleMenu({
                                                    menu : 'delete_'+menu.SlugMenu,
                                                    value : $event
                                                })"
                                            />
                                        </td>
                                        <td class="text-center">
                                            <b-form-checkbox v-if="menu.otoritas_menu.export == 'true'"
                                                :checked="menu_checked['export_'+menu.SlugMenu]"
                                                @change="updateRoleMenu({
                                                    menu : 'export_'+menu.SlugMenu,
                                                    value : $event
                                                })"
                                            />
                                        </td>
                                        <td class="text-center">
                                            <b-form-checkbox v-if="menu.otoritas_menu.import == 'true'"
                                                :checked="menu_checked['import_'+menu.SlugMenu]"
                                                @change="updateRoleMenu({
                                                    menu : 'import_'+menu.SlugMenu,
                                                    value : $event
                                                })"
                                            />
                                        </td>
                                    </tr>
                                    <template v-if="menu.childs.length > 0">
                                    <tr v-for="child in menu.childs" :key="child[0]">
                                        <td style="padding-left: 40px;">
                                            <i :class="child.icon"></i> {{ child.text_menu }}
                                        </td>
                                        <td class="text-center">
                                            <b-form-checkbox v-if="child.otoritas_menu.view == 'true'"
                                                :checked="menu_checked['view_'+child.SlugMenu]"
                                                @change="updateRoleMenu({
                                                    menu : 'view_'+child.SlugMenu,
                                                    value : $event
                                                })"
                                            />
                                        </td>
                                        <td class="text-center">
                                            <b-form-checkbox v-if="child.otoritas_menu.create == 'true'"
                                                :checked="menu_checked['create_'+child.SlugMenu]"
                                                @change="updateRoleMenu({
                                                    menu : 'create_'+child.SlugMenu,
                                                    value : $event
                                                })"
                                            />
                                        </td>
                                        <td class="text-center">
                                            <b-form-checkbox v-if="child.otoritas_menu.edit == 'true'"
                                                :checked="menu_checked['edit_'+child.SlugMenu]"
                                                @change="updateRoleMenu({
                                                    menu : 'edit_'+child.SlugMenu,
                                                    value : $event
                                                })"
                                            />
                                        </td>
                                        <td class="text-center">
                                            <b-form-checkbox v-if="child.otoritas_menu.delete == 'true'"
                                                :checked="menu_checked['delete_'+child.SlugMenu]"
                                                @change="updateRoleMenu({
                                                    menu : 'delete_'+child.SlugMenu,
                                                    value : $event
                                                })"
                                            />
                                        </td>
                                        <td class="text-center">
                                            <b-form-checkbox v-if="child.otoritas_menu.export == 'true'"
                                                :checked="menu_checked['export_'+child.SlugMenu]"
                                                @change="updateRoleMenu({
                                                    menu : 'export_'+child.SlugMenu,
                                                    value : $event
                                                })"
                                            />
                                        </td>
                                        <td class="text-center">
                                            <b-form-checkbox v-if="child.otoritas_menu.import == 'true'"
                                                :checked="menu_checked['import_'+child.SlugMenu]"
                                                @change="updateRoleMenu({
                                                    menu : 'import_'+child.SlugMenu,
                                                    value : $event
                                                })"
                                            />
                                        </td>
                                    </tr>
                                    </template>
                                </template>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </LayoutsAdminVue>
</template>
<script>
import { mapState, mapActions } from 'vuex'
import LayoutsAdminVue from '../../../layouts/LayoutsAdmin.vue'
export default {
    data() {
        return {
            role_id: ''
        }
    },
    components: {
        LayoutsAdminVue
    },
    computed: {
        ...mapState('OtoritasmenuStoreIndex', {
            all_menu: state => state.all_menu,
            all_role: state => state.all_role,
            menu_checked: state => state.menu_checked,
        })
    },
    methods: {
        ...mapActions('OtoritasmenuStoreIndex', {
            getAllMenu: 'getAllMenu',
            getRole: 'getRole',
            getOtoritasByRole: 'getOtoritasByRole',
            updateRoleMenu: 'updateRoleMenu'
        }),
        updateOtoritasMenu(){
            if(this.role_id !== ''){
                let self = this;
                this.$store.dispatch('UI/setLoader', true);
                this.$axios.defaults.headers.common['Authorization'] = `Bearer ${this.$store.state.AUTH.token}`;
                this.$axios.put('otoritasmenu/'+self.role_id, {
                    otoritas: self.menu_checked
                })
                .then(response => {
                    if(response.status === 200){
                        self.$swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: 'Berhasil Memperbarui Otoritas Menu',
                            footer: '<a href="#">Silahkan Login ulang kembali untuk melihat perubahan</a>'
                        })
                    }
                })
                .catch(error => {
                    self.errors = error.response.data.errors;
                    console.log(error);
                })
                .finally(() => this.$store.dispatch('UI/setLoader', false));
            }
        },
        tes(s){
            console.log(s)
        }

    },
    mounted() {
        // this.redirectIfNotAcces('view_otoritas_menu')
        this.getRole();
        this.getAllMenu();
    }
}
</script>
<style lang="">

</style>
