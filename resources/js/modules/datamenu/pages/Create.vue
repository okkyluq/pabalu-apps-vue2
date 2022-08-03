<template>
    <b-sidebar no-close-on-esc no-close-on-backdrop backdrop bg-variant="white" backdrop-variant="dark" no-header right z-index="99999"
        @hidden="clearForm" @shown="clearForm" :visible="visible_sidebar"
        width="50em"
    >
        <div class="card card-primary card-flat">
            <div class="overlay" v-if="$store.state.UI.loader">
                <i class="fa fa-spinner faa-spin animated faa-fast" style="font-size:2em;"></i>
            </div>
            <div class="card-header">
                <h3 class="card-title">Form Tambah Menu</h3>
            </div>

            <div class="card-body">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Text Menu</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" placeholder="Text Menu"
                            :class="{'is-invalid' : errors.text_menu}"
                            :value="form.text_menu"
                            @input="updateValueForm({
                                name : 'text_menu',
                                value : $event.target.value
                            })"
                        >
                        <span class="error invalid-feedback" v-if="errors.text_menu">{{ errors.text_menu[0]  }}</span>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Parent Menu</label>
                    <div class="col-sm-8">
                        <SelectSearch
                            url="getmenu" placeholder="Cari Menu" :value="form.parent_menu" label="text_menu" :invalidclass="{'is-invalid' : errors.parent_menu}"
                            @select="updateValueForm({ name: 'parent_menu', value: $event })"
                            @clear="updateValueForm({ name: 'parent_menu', value: null })"
                        />
                        <span class="error invalid-feedback" v-if="errors.parent_menu">{{ errors.parent_menu[0]  }}</span>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">URL Menu</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" placeholder="Url Menu"
                            :class="{'is-invalid' : errors.url_menu}"
                            :value="form.url_menu"
                            @input="updateValueForm({
                                name : 'url_menu',
                                value : $event.target.value
                            })"
                        >
                        <span class="error invalid-feedback" v-if="errors.url_menu">{{ errors.url_menu[0]  }}</span>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Status Active</label>
                    <div class="col-sm-8">
                        <div class="form-check mt-2">
                            <input type="checkbox" class="form-check-input" id="exampleCheck2" value="true"
                                :checked="form.status_menu"
                                @input="updateValueForm({
                                    name : 'status_menu',
                                    value : $event.target.checked
                                })"
                            >
                            <label class="form-check-label" for="exampleCheck2">{{ form.status_menu === true ? 'Active' : 'Nonactive' }}</label>
                        </div>
                        <span class="error invalid-feedback" v-if="errors.status_menu">{{ errors.status_menu[0]  }}</span>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Icon</label>
                    <div class="col-sm-8">
                        <vfa-picker :value="form.icon"
								@input="updateValueForm({
									name : 'icon',
									value : `fa fa-`+$event
								})"
                                :class="{ 'is-invalid' : errors.icon }"
							>
                                <template v-slot:activator="{ on }">
                                    <div class="input-group">
                                        <input type="text" class="form-control" :value="form.icon" @click="on" placeholder="Pilih Icon" :class="{'is-invalid' : errors.icon}">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i :class="form.icon"></i></span>
                                        </div>
                                    </div>
                                </template>
                        </vfa-picker>
                        <span class="error invalid-feedback" v-if="errors.icon">{{ errors.icon[0]  }}</span>
                    </div>
                </div>
                <div class="form-group row">
                    <table class="table table-bordered text-nowrap">
                        <thead>
                            <tr>
                                <th colspan="6" class="bg-dark text-center">Otoritas Menu</th>
                            </tr>
                            <tr>
                                <th class="text-center">View</th>
                                <th class="text-center">Create</th>
                                <th class="text-center">Edit</th>
                                <th class="text-center">Delete</th>
                                <th class="text-center">Export</th>
                                <th class="text-center">Import</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">
                                    <input class="form-control" type="checkbox" :checked="form.otoritas.view"
                                        @change="updateValueFormOtoritas({
                                            name : 'view',
                                            value : $event.target.checked
                                        })"
                                    >
                                </td>
                                <td class="text-center">
                                    <input class="form-control" type="checkbox" :checked="form.otoritas.create"
                                        @change="updateValueFormOtoritas({
                                            name : 'create',
                                            value : $event.target.checked
                                        })"
                                    >
                                </td>
                                <td class="text-center">
                                    <input class="form-control" type="checkbox" :checked="form.otoritas.edit"
                                        @change="updateValueFormOtoritas({
                                            name : 'edit',
                                            value : $event.target.checked
                                        })"
                                    >
                                </td>
                                <td class="text-center">
                                    <input class="form-control" type="checkbox" :checked="form.otoritas.delete"
                                        @change="updateValueFormOtoritas({
                                            name : 'delete',
                                            value : $event.target.checked
                                        })"
                                    >
                                </td>
                                <td class="text-center">
                                    <input class="form-control" type="checkbox" :checked="form.otoritas.export"
                                        @change="updateValueFormOtoritas({
                                            name : 'export',
                                            value : $event.target.checked
                                        })"
                                    >
                                </td>
                                <td class="text-center">
                                    <input class="form-control" type="checkbox" :checked="form.otoritas.import"
                                        @change="updateValueFormOtoritas({
                                            name : 'import',
                                            value : $event.target.checked
                                        })"
                                    >
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <button type="button" class="btn btn-success btn-block" @click="sendForm">
                            <i class="fa-solid fa-floppy-disk"></i> Simpan
                        </button>
                        <button type="button" class="btn btn-danger btn-block" @click="$store.dispatch('DatamenuStoreCreate/toggleSidebar', false)">
                            <i class="fa-solid fa-rectangle-xmark"></i> Batal
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </b-sidebar>
</template>
<script>
import { mapActions, mapState } from 'vuex'
import SelectSearch from '../../../partials/SelectSearch.vue'
export default {
    components: {
        SelectSearch
    },
    data() {
        return {
            errors: {},
        }
    },
    computed: {
        ...mapState('DatamenuStoreCreate', {
            form: state => state.form,
            visible_sidebar: state => state.visible_sidebar
        })
    },
    methods: {
        ...mapActions('DatamenuStoreCreate', {
            clearForm: 'clearForm',
            updateValueForm: 'updateValueForm',
            updateValueFormOtoritas: 'updateValueFormOtoritas'
        }),
        sendForm(){
            this.errors = {}
            let self = this;
			let formData = {
				text_menu : this.form.text_menu,
                parent_menu : this.form.parent_menu?.id || null,
                url_menu : this.form.url_menu,
                status_menu : this.form.status_menu,
                icon : this.form.icon,
                otoritas : {
                    view: this.form.otoritas.view.toString(),
                    create: this.form.otoritas.create.toString(),
                    edit: this.form.otoritas.edit.toString(),
                    delete: this.form.otoritas.delete.toString(),
                    export: this.form.otoritas.export.toString(),
                    import: this.form.otoritas.import.toString(),
                }
			}
            this.$store.dispatch('UI/setLoader', true);
            this.$axios.defaults.headers.common['Authorization'] = `Bearer ${this.$store.state.AUTH.token}`;
			this.$axios.post('datamenu', formData)
				.then(response => {
                    if(response.status === 200){
                        this.$store.dispatch('DatamenuStoreCreate/toggleSidebar', false);
                        this.$store.dispatch('DatamenuStoreIndex/getListMenu');
                    }
				})
				.catch(error => {
					this.errors = error.response.data.errors;
					console.log(error);
				})
				.finally(() => this.$store.dispatch('UI/setLoader', false));
        },
        tes(value){
            console.log(value)
        }
    }
}
</script>
<style scoped>
    table > tbody > tr > td > input[type='checkbox'] {
        height: 15px;
    }
</style>
