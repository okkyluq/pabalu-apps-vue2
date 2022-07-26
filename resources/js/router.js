// import Vue from 'vue';
import * as VueRouter from 'vue-router';
import { routes } from './modules/index'
import {store} from './store'

const router = VueRouter.createRouter({
    history: VueRouter.createWebHistory(),
    routes : routes
});


router.beforeEach((to, from, next) => {
    if(to.path !== '/login' && store.state.AUTH.isAuthenticated !== true) {
        next({ path: '/login' });
    } else if (to.path === '/login' && store.state.AUTH.isAuthenticated === true){
        next({ path: '/' })
    } else {
        next()
    }
});

export default router;
