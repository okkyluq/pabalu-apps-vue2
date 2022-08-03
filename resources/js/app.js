import Vue from 'vue';
import './bootstrap'
import router from './router'
import store from './store'
import axios from './config/axios'
import { BootstrapVue } from 'bootstrap-vue'
import VueLoading from 'vue-loading-overlay';
import 'bootstrap-vue/dist/bootstrap-vue.css'
import 'vue-loading-overlay/dist/vue-loading.css';
import Multiselect from 'vue-multiselect'
import 'vue-multiselect/dist/vue-multiselect.min.css';
import VueFontAwesomePicker from "vfa-picker";
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';

Vue.prototype.$axios = axios;
Vue.component('multiselect', Multiselect)
Vue.use(BootstrapVue)
Vue.use(VueLoading)
Vue.use(VueFontAwesomePicker);
Vue.use(VueSweetalert2);
const app = new Vue({
    el: '#app',
    router,
    store
});
