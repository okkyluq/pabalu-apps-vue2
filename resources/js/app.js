import Vue from 'vue';
import './bootstrap'
import router from './router'
import store from './store'
import axios from './config/axios'
import { BootstrapVue } from 'bootstrap-vue'
import 'bootstrap-vue/dist/bootstrap-vue.css'

Vue.prototype.$axios = axios;
Vue.use(BootstrapVue)
const app = new Vue({
    el: '#app',
    router,
    store
});
