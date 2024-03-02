<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Entre em sua conta</div>

                    <div class="card-body">
                        <form method="POST" action="" @submit.prevent="login($event)">
                            <input type="hidden" name="_token" :value="csrf_token">
                            <div class="mb-3">
                                <label for="email" class="form-label">Endereço de Email</label>
                                <input id="email" type="email" class="form-control" name="email" placeholder="Digite seu Email" value="" required autocomplete="email" autofocus v-model="email">
                            </div>

                            <div class="mb-3">
                                <label for="password" class="forml-label">Senha</label>
                                <input id="password" type="password" class="form-control" placeholder="Digite sua Senha" name="password" required autocomplete="current-password" v-model="password">
                            </div>

                            <div class="mb-3 form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                <label class="form-check-label" for="remember">Mantenha-me conectado</label>
                            </div>

                            <button type="submit" class="btn btn-custom">Login</button>
                            <a class="btn btn-link" href="">Esqueci a senha</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>
</template>

<script>
    export default {
        props: ['csrf_token'], //Valores para serem utilizados
        data() {
            return {
                email: '',
                password: ''
            }
        },
        methods: {
            login(e) {

                let url = 'http://localhost:8000/api/login'
                let configuracao = {
                    method: 'post',
                    body: new URLSearchParams({
                        'email': this.email,
                        'password': this.password
                    })
                }
                fetch(url, configuracao)
                    .then(response => response.json())
                    .then(data => {
                        if(data.token) {
                            document.cookie = 'token='+data.token+';SameSite=Lax'
                        }
                        //dá a sequência no envio do form de autenticação por sessão
                        e.target.submit()    
                    })
            }
        }
    }
</script>

<style scoped>
    .card {
        margin-top: 50px;
    }

    .card-header {
        background-color: rgb(13, 173, 174);
        color: white;
        font-weight: bold;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }

    .btn-link {
        color: #007bff;
    }

    .btn-link:hover {
        color: #0056b3;
    }

    .btn-custom {
        background-color: rgb(13, 173, 174);
        border-color: rgb(13, 173, 174);
        color: white
    }

    .btn-custom:hover {
        background-color: rgb(0, 150, 152);
        border-color: rgb(0, 150, 152);
    }
</style>