<template>
    <div class="container">
        <div class="row">
            <div class="col m4  offset-m4">
                <h3 class="center-align">Contas</h3>
                <form class="col s12">
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="email" type="email" v-model='user.email'>
                            <label for="email">Email</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="password" type="password" v-model='user.password'>
                            <label for="password">Password</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <p>
                                <input type="checkbox" id="remember">
                                <label for="remember">Remember me</label>
                            </p>
                        </div>
                    </div>
                    <div class="divider"></div>
                    <div class="row">
                        <div class="col m12">
                            <p class="right-align">
                                <button class="btn btn-large waves-effect waves-light" type="button" name="action" @click="login()">Login</button>
                            </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data(){
            return {
                user: {
                    email: '',
                    password: ''
                }
            };
        },
        mounted() {
            console.log('Component ready.')
        },
        methods: {
            login(){
                this.$http.post('http://localhost:8000/api/token', this.user).then(
                            (response) => {
                                window.localStorage.setItem('token',response.data.token);
                                console.log('login funcionando');
                            }
                 )
            }
        }
    }
</script>