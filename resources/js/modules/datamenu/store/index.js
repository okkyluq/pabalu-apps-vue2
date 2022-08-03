import axios from '../../../config/axios'
export default {
    state: {
        list_menu: [],
        meta: {},
    },
    getters: {},
    mutations: {
        SET_LIST_MENU(state, payload){
            state.list_menu = payload.data;
            state.meta = payload.meta;
        },
    },
    actions: {
        getListMenu({commit, rootState, dispatch}, page=1){
            dispatch('UI/setLoader', true, {root:true});
            axios.defaults.headers.common['Authorization'] = `Bearer ${rootState.AUTH.token}`;
            axios.get('datamenu', {
                params: {
                    page: page,
                }
            })
            .then(function(response){
                commit('SET_LIST_MENU', response.data)
            })
            .catch(function(error){
                console.log(error)
            })
            .finally(() => dispatch('UI/setLoader', false, {root:true}));

        }
    }
}
