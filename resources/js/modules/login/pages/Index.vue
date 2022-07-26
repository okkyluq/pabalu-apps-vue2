<template>
    <LayoutsLogin>
        <div class="login-box">
            <div class="card card-outline card-primary">
                <div class="card-header text-center">
                    <a href="#" class="h1"><b>Pabalu</b> Apps</a>
                </div>
                <div class="card-body">
                    <p class="login-box-msg">Login Untuk Menggunakan Aplikasi</p>

                    <div class="alert alert-danger alert-dismissible" v-if="errors">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-ban"></i> Peringatan!</h5>
                        {{ errors }}
                    </div>

                    <form action="#" method="post" @submit.prevent="login">
                        <div class="input-group mb-3">
                            <input type="email" class="form-control" placeholder="Username" v-model="form.username">
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
        login(){
            let self = this;
            this.errors = null;
            this.$axios.post('login', {
                username: this.form.username,
                password: this.form.password,
            })
            .then(function(response){
                console.log(response)
            })
            .catch(function(error){
                let errors = error.response;
                if(errors.status === 400){
                    self.errors = errors.data.error;
                    // console.log(errors.data.error)
                }
            });
        }
    },
}
</script>

