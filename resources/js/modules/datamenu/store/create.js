export default {
    state: {
        form: {
            text_menu : null,
            parent_menu : null,
            url_menu : null,
            status_menu : true,
            icon : null,
            otoritas : {
                view: false,
                create: false,
                edit: false,
                delete: false,
                export: false,
                import: false,
            },
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
                text_menu : null,
                parent_menu : null,
                url_menu : null,
                status_menu : true,
                icon : null,
                otoritas : {
                    view: false,
                    create: false,
                    edit: false,
                    delete: false,
                    export: false,
                    import: false,
                },
            }
        },
        UPDATE_VALUE_FORM(state, payload){
            state.form[payload.name] = payload.value;
        },
        UPDATE_VALUE_FORM_OTORITAS(state, payload){
            state.form.otoritas[payload.name] = payload.value;
        }
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
        updateValueFormOtoritas({commit}, payload){
            commit('UPDATE_VALUE_FORM_OTORITAS', payload);
        },
    }
}
