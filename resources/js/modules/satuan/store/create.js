export default {
    state: {
        form: {
            satuan: '',
            keterangan: '',
        },
        visible_sidebar: false
    },
    getters: {},
    mutations: {
        TOGGLE_SIDEBAR(state, payload){
            state.visible_sidebar = payload
        },
        CLEAR_FORM(state){
            state.form = {
                satuan : '',
                keterangan : '',
            }
        },
        UPDATE_VALUE_FORM(state, payload){
            state.form[payload.name] = payload.value;
        },
    },
    actions: {
        toggleSidebar({commit}, payload){
            commit('TOGGLE_SIDEBAR', payload);
        },
        clearForm({commit}){
            commit('CLEAR_FORM');
        },
        updateValueForm({commit}, payload){
            commit('UPDATE_VALUE_FORM', payload);
        },
    }
}
