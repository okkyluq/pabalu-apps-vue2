<template>
    <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="fas fa-circle nav-icon"></i>
                <p>Level 1</p>
            </a>
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
