<template>
    <LayoutsLogin>
        <div class="login-box">
            <div class="card card-outline card-primary">
                <div class="card-header text-center">
                    <a href="#" class="h1"><b>Pabalu</b> Apps</a>
                </div>
                <div class="card-body">
                    <p class="login-box-msg">Login Untuk Menggunakan Aplikasi</p>
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
            form: {
                username: '',
                password: ''
            }
        }
    },
    methods: {
        login(){
            console.log(this.form)
        }
    },
}
</script>

