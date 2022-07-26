import { createStore } from 'vuex'
import createPersistedState from "vuex-persistedstate";
import ui from './store_default/ui'
import auth from './store_default/auth'
import * as Modules from './modules/'

const ui_persisted = createPersistedState({
    paths: ['UI', 'AUTH']
})

let join_store = Object.assign(Modules.store, {UI: ui, AUTH: auth})

export const store = createStore({
    modules: join_store,
    plugins: [ui_persisted],
})
