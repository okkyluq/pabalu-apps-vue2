<template>
    <ul class="nav nav-pills nav-sidebar flex-column">
        <li class="nav-item">
            <router-link class="nav-link" to="/">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</p>
            </router-link>
        </li>

        <!-- <li class="nav-item" v-for="(menu, index) in menu_all" :key="index" :class="{ 'menu-is-opening menu-open' : menu_open }" @click="open_menu(menu.childs.length)">
            <router-link class="nav-link" :to="menu.url" v-if="!menu.childs.length > 0">
                <i class="nav-icon" :class="menu.icon"></i>
                <p>{{ menu.text_menu }}</p>
            </router-link>
            <a href="#" class="nav-link" v-else>
                <i class="nav-icon" :class="menu.icon"></i>
                <p>
                    {{ menu.text_menu }}
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview" v-if="menu.childs.length > 0">
                <li class="nav-item" v-for="(child, index) in menu.childs" :key="index">
                    <router-link :to="child.url" class="nav-link">
                        <i class="nav-icon" :class="child.icon"></i>
                        <p>{{ child.text_menu }}</p>
                    </router-link>
                </li>
            </ul>
        </li> -->

        <ChildNavigationMenu v-for="(menu, index) in menu_all" :key="index"
            :slug="menu.SlugMenu"
            :title=menu.text_menu
            :icon=menu.icon
            :single_menu="!menu.childs.length  > 0"
            :link=menu.url
            :childs="menu.childs"
        />


        <li class="nav-item">
            <a href="#" class="nav-link" @click.prevent="logout">
                <i class="nav-icon fa fa-power-off"></i>
                <p>Logout</p>
            </a>
        </li>


    </ul>
</template>
<script>
import ChildNavigationMenu from './ChildNavigationMenu.vue';
import { mapState, mapActions, mapGetters } from 'vuex'
export default {
    components: {
        ChildNavigationMenu
    },
    data() {
        return {
			menu_open: false,
		}
    },
    computed: {
        ...mapState('UI', {
            'menu_all' : state => state.menu_all
        }),
        ...mapGetters('UI', {
            getAllMenu :'getAllMenu'
        })
    },
    methods: {
        ...mapActions('UI', {
            setMenuAll : 'setMenuAll',
            minimizeSidebar : 'minimizeSidebar',
            setMenuUser: 'setMenuUser',
            setNotificationUser: 'setNotificationUser',
            setDefaultUi: 'setDefaultUi'
        }),
        ...mapActions('AUTH', {
            clearTokenUser: 'clearTokenUser'
        }),
        open_menu(length){
			if(!length > 0){
				this.menu_open = !this.menu_open;
			}
		},
        logout(){
            let self = this;
            this.$axios.defaults.headers.common['Authorization'] = `Bearer ${this.$store.state.AUTH.token}`;
            this.$axios.post('logout')
            .then(function(response){
                self.setDefaultUi();
                self.clearTokenUser();
                self.$router.push({ path: '/login' });
            })
            .catch(function(error){
                console.log(error);
            });
        }
    },
    mounted(){


        let self = this;
        if(self.menu_all === null){
            this.$axios.defaults.headers.common['Authorization'] = `Bearer ${this.$store.state.AUTH.token}`;
            this.$axios.get('getmenuuser')
                .then(function(response){
                    self.setMenuAll(response.data);
                })
                .catch(function(error){
                    alert('Gagal Memuat Menu');
                    console.log(error);
                });
        }
    },


}
</script>
<style>

</style>
