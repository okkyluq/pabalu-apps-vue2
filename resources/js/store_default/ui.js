export default {
    namespaced: true,
    state: {
        loader: false,
        sidebar_active: true,
        header_mode_dark: false,
        mode_dark: false,
        menu_user: false,
        notification_user: false,
        menu_all: null,
    },
    getters: {},
    mutations: {
        SET_LOADER(state, value){
            state.loader = value;
        },
        SET_MINIMIZE_SIDEBAR(state){
            state.sidebar_active = !state.sidebar_active
        },
        SET_HEADER_MODE_DARK(state){
            state.header_mode_dark = !state.header_mode_dark
        },
        SET_MODE_DARK(state){
            state.mode_dark = !state.mode_dark
        },
        SET_MENU_USER(state){
            state.menu_user = !state.menu_user
        },
        SET_NOTIFICATION_USER(state){
            state.notification_user = !state.notification_user
        },
        SET_DEFAULT_UI(state){
            state.sidebar_active = true;
            state.header_mode_dark = false;
            state.mode_dark = false;
            state.menu_user = false;
            state.notification_user = false;
            state.menu_all = null;
        },
        SET_MENU_ALL(state, payload){
            state.menu_all = payload;
        },
    },
    actions: {
        setLoader({commit}, value){
            commit('SET_LOADER', value);
        },
        setDefaultUi({commit}){
            commit('SET_DEFAULT_UI');
        },
        minimizeSidebar({commit}){
            commit("SET_MINIMIZE_SIDEBAR");
        },
        setHeaderModeDark({commit}){
            commit("SET_HEADER_MODE_DARK");
        },
        setModeDark({commit}){
            commit("SET_MODE_DARK");
        },
        setMenuUser({commit}){
            commit('SET_MENU_USER');
        },
        setNotificationUser({commit}){
            commit('SET_NOTIFICATION_USER');
        },
        setMenuAll({commit}, payload){
            commit('SET_MENU_ALL', payload);
        }
    }
}
