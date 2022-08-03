import axios from '../../../config/axios'
export default {
    state: {
        form_search: {
            satuan: null,
        },
        list_satuan : {},
        meta: {}
    },
    getters: {},
    mutations: {
        SET_LIST_SATUAN(state, payload){
            state.list_satuan = payload.data;
            state.meta = payload.meta;
        }
    },
    actions: {
        getListSatuan({commit, state, rootState, dispatch}, page=1){
            dispatch('UI/setLoader', true, {root: true});
            axios.defaults.headers.common['Authorization'] = `Bearer ${rootState.AUTH.token}`;
            axios.get('satuan', {
                params: {
                    page: page,
                }
            })
            .then(function(response){
                commit('SET_LIST_SATUAN', response.data);
            })
            .catch(function(error){
                console.log(error);
            })
            .finally(() => dispatch('UI/setLoader', false, {root: true}));
        }
    }
}
