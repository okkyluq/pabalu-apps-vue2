import axios from '../../../config/axios'
import Vue from 'vue'
export default {
    state: {
        all_menu :{},
        all_role: {},
        menu_checked : {},
    },
    getters: {},
    mutations: {
        RESET_MENU_CHECKED(state){
            state.menu_checked = {}
        },
        SET_ALL_MENU(state, payload){
            state.all_menu = payload;
        },
        SET_ALL_ROLE(state, payload){
            state.all_role = payload;
        },
        SET_CHECKED_MENU(state, payload){
            Vue.set(state.menu_checked, payload.menu, payload.value)
        },
        UPDATE_ROLE_MENU(state, payload){
            state.menu_checked[payload.menu] = payload.value
        }
    },
    actions: {
        getAllMenu({commit, dispatch, rootState}){
            dispatch('UI/setLoader', true, {root:true});
            axios.defaults.headers.common['Authorization'] = `Bearer ${rootState.AUTH.token}`;
            axios.get('getallmenu')
            .then(function(response){
                commit('SET_ALL_MENU', response.data.data_menu);
            })
            .catch(function(errors){
                alert('masalah cek console');
                console.log(errors)
            })
            .finally(() => dispatch('UI/setLoader', false, {root:true}));
        },
        getRole({commit, dispatch, rootState}){
            dispatch('UI/setLoader', true, {root:true});
            axios.defaults.headers.common['Authorization'] = `Bearer ${rootState.AUTH.token}`;
            axios.get('getrole')
            .then(function(response){
                commit('SET_ALL_ROLE', response.data.data)
            })
            .catch(function(errors){
                alert('masalah cek console');
                console.log(errors)
            })
            .finally(() => dispatch('UI/setLoader', false, {root:true}));
        },
        getOtoritasByRole({commit, dispatch, rootState}, payload){
            if(payload != ''){
                dispatch('UI/setLoader', true, {root:true});
                commit('RESET_MENU_CHECKED')
                axios.defaults.headers.common['Authorization'] = `Bearer ${rootState.AUTH.token}`;
                axios.get('getotoritasrole', { params: { role_id: payload } })
                .then(function(response){
                    let otoritas = response.data.data
                    otoritas.forEach(function (value) {
                        commit('SET_CHECKED_MENU', {
                            menu: value.name,
                            value: true
                        })
                    });
                })
                .catch(function(errors){
                    alert('masalah cek console');
                    console.log(errors)
                })
                .finally(() => dispatch('UI/setLoader', false, {root:true}));
            } else {
                commit('RESET_MENU_CHECKED')
            }
        },
        updateRoleMenu({commit}, payload){
            commit('UPDATE_ROLE_MENU', payload);
        },
    }
}
