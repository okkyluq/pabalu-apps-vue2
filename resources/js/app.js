import { createApp } from 'vue'
import './bootstrap'
import router from './router'
import {store} from './store'

let app = createApp({});
app.use(router);
app.use(store)
app.mount('#app');
