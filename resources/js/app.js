import { createApp } from 'vue'
import './bootstrap'
import router from './router'
import {store} from './store'
import axios from './config/axios'

let app = createApp({});
app.use(router);
app.use(store);
app.mount('#app');
app.config.globalProperties.$axios = axios;
