<template>
    <LayoutsLogin>
        <div class="login-box">
            <div class="card card-outline card-primary">
                <div class="overlay" v-if="$store.state.UI.loader">
                    <i class="fa fa-spinner faa-spin animated faa-fast" style="font-size:2em;"></i>
                </div>
                <div class="card-header text-center">
                    <a href="#" class="h1"><img src="pabalu.png" alt="" style="width:200px;"></a>
                </div>
                <div class="card-body">

                    <p class="login-box-msg">Login Untuk Menggunakan Aplikasi</p>

                    <div class="alert alert-danger alert-dismissible" v-if="errors">
                        <h5><i class="icon fas fa-ban"></i> Peringatan!</h5>
                        {{ errors }}
                    </div>

                    <form action="#" method="post" @submit.prevent="login">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Username" v-model="form.username">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" placeholder="Password" v-model="form.password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary btn-block">Login</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </LayoutsLogin>
</template>
<script>
import LayoutsLogin from '../../../layouts/LayoutsLogin.vue'
import { mapActions } from 'vuex';
export default {
    components: {
        LayoutsLogin
    },
    data() {
        return {
            errors: null,
            form: {
                username: '',
                password: ''
            }
        }
    },
    methods: {
        ...mapActions('AUTH', {
            setTokenUser: 'setTokenUser'
        }),
        async login(){
            try {
                let self = this;
                this.$store.dispatch('UI/setLoader', true);
                const response = await this.$axios.post('login', {
                    username: this.form.username,
                    password: this.form.password,
                });
                await self.setTokenUser(response.data);
                await self.$router.push({ path: '/' });
            } catch (error) {
                this.errors = error.response.data.error;
            } finally {
                this.$store.dispatch('UI/setLoader', false)
            }
        }
    },
}
</script>

