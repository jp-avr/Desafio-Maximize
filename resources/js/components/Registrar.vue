<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Registre-se</div>
                    <div class="card-body">
                        <div v-if="errorMessage" v-html="errorMessage" class="error-message"></div>
                        <div v-if="successMessage" class="success-message">{{ successMessage }}</div>
                        <form method="POST" action="" @submit.prevent="salvar()">
                            <input type="hidden" name="_token" :value="csrf_token">
                            <div class="md-3">
                                <label for="name" class="form-label">Nome</label>
                                <input id="name" type="text" class="form-control" placeholder="Digite o seu Nome" name="name" value="" v-model="name" autocomplete="name" autofocus>
                            </div>
                                        
                            <div class="md-3">
                                <label for="email" class="form-label">Email</label>
                                <input id="email" type="email" class="form-control" placeholder="Digite o seu Email" name="email" value="" v-model="email" autocomplete="email">
                            </div>

                            <div class="md-3">
                                <label for="password" class="form-label">Senha</label>
                                <input id="password" type="password" class="form-control" placeholder="Digite a sua Senha" name="password" v-model="password" autocomplete="new-password">
                            </div>

                            <div class="md-3">
                                <label for="password-confirm" class="form-label">Confirmar Senha</label>
                                <input id="password-confirm" type="password" class="form-control" placeholder="Confirme a sua senha" v-model="password_confirmation" name="password_confirmation" autocomplete="new-password">
                            </div>

                            <button type="submit" class="btn btn-custom">Registrar</button>
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
                name: '',
                email: '',
                password: '',
                password_confirmation: '',
                urlBase: 'http://localhost:8000/api/register',
                errorMessage: '',
                successMessage: ''
            }
        },
        methods: {
            salvar() {
            // Envie os dados do formulário para o servidor aqui
            console.log(this.name, this.email,this.password);

            const formData = new FormData(); //FORMDATA serve para instanciar um formulário para poder escolher seus atributos
            formData.append('name', this.name); //Atribuir valores ao formulário
            formData.append('email', this.email); //Atribuir valores ao formulário
            formData.append('password', this.password);
            formData.append('password_confirmation', this.password_confirmation);

            let config = {
                headers: {
                'Content-Type': 'multipart-form-data', //Escolhendo o tipo de conteúdo da nossa requisição (igual ao Postman)
                'Accept': 'application/json', //SUPORTA RETORNOS VALORES DE RESPOSTAS UTILIZANDO JSON
                'Authorization': this.token
                }
            }
            // Aqui você pode usar Axios ou outra biblioteca para enviar os dados para o servidor
            axios.post(this.urlBase, formData, config)
                .then(response => {
                console.log(response.data);
                this.successMessage = 'Usuario cadastrado com sucesso!';
                // Limpar o formulário ou fazer outras ações necessárias após o envio bem-sucedido
                this.clearForm();
                })
                .catch(error => {
                if (error.response && error.response.status === 422 && error.response.data.errors) {
                    // Se houver erros de validação, atualize o estado do componente com as mensagens de erro
                    this.Error();
                    this.errorMessage = Object.values(error.response.data.errors).join('.' + '<br>');

                } else {
                    this.errorMessage = 'Ocorreu um erro ao enviar o formulário.';

                }
                console.error(error);
                });
            },
            clearForm() {
            // Limpar o formulário após o envio bem-sucedido
            this.name = '';
            this.email = '';
            this.password = [];
            this.password_confirmation = '';
            this.errorMessage = '';
        },
Error() {
  this.successMessage = '';
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

    .md-3 {
        margin-bottom: 10px;
    }
</style>