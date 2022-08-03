<template>
    <li class="nav-item"
        :class="menu_open === true ? 'menu-is-opening menu-open' : ''"
        @click.prevent="open_menu"
    >
        <router-link class="nav-link" :to="link" v-if="!childs.length > 0">
            <i class="nav-icon" :class="icon"></i>
            <p>{{ title }}</p>
        </router-link>
        <a href="#" class="nav-link" v-else>
            <i class="nav-icon" :class="icon"></i>
            <p>
                {{ title }}
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview" v-if="childs.length > 0">
            <li class="nav-item" v-for="(child, index) in childs" :key="index">
                <router-link :to="child.url" class="nav-link">
                    <i class="nav-icon" :class="child.icon"></i>
                    <p>{{ child.text_menu }}</p>
                </router-link>
            </li>
        </ul>
    </li>
</template>
<script>
import { mapState } from 'vuex'
export default {
    props: {
        slug: String,
        title: String,
		icon: String,
		link: String,
		childs: Array,
		single_menu: Boolean
    },
    data() {
        return {
			menu_open: false
		}
    },
    computed: {
        ...mapState('AUTH', {
            permission: state => state.permission
        }),
    },
    methods: {
        open_menu(){
			if(!this.single_menu){
				this.menu_open = !this.menu_open;
			}
		},
		openLinkChild(link){
			this.$router.push(link)
		}
    }
}
</script>
<style>

</style>
