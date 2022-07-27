import axios from '../../../config/axios'
export default {
    state: {
        form_search: {
            kategori: null,
        },
        list_kategori : {},
        meta: {}
    },
    getters: {},
    mutations: {
        SET_LIST_KATEGORI(state, payload){
            state.list_kategori = payload.data;
            state.meta = payload.meta;
        }
    },
    actions: {
        getListKategori({commit, state, rootState, dispatch}, page=1){
            dispatch('UI/setLoader', true, {root: true});
            axios.defaults.headers.common['Authorization'] = `Bearer ${rootState.AUTH.token}`;
            axios.get('kategori', {
                params: {
                    page: page,
                }
            })
            .then(function(response){
                commit('SET_LIST_KATEGORI', response.data);
            })
            .catch(function(error){
                console.log(error);
            })
            .finally(() => dispatch('UI/setLoader', false, {root: true}));
        }
    }
}
