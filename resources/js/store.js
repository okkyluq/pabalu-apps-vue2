import Vue from 'vue';
import Vuex from 'vuex';
import createPersistedState from "vuex-persistedstate";
import ui from './store_default/ui';
import auth from './store_default/auth';
import { store } from './modules'
Vue.use(Vuex);

const ui_persisted = createPersistedState({
    paths: ['UI', 'AUTH']
})

let modules = Object.assign(store, {UI: ui, AUTH: auth})

export default new Vuex.Store({
    modules,
    plugins: [ui_persisted],
});

// vue 3
// import { createStore } from 'vuex'
// import createPersistedState from "vuex-persistedstate";
// import ui from './store_default/ui'
// import auth from './store_default/auth'
// import * as Modules from './modules/'

// const ui_persisted = createPersistedState({
//     paths: ['UI', 'AUTH']
// })

// let join_store = Object.assign(Modules.store, {UI: ui, AUTH: auth})

// export const store = createStore({
//     modules: join_store,
//     plugins: [ui_persisted],
// })
