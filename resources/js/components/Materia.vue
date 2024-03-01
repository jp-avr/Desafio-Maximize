<template>
    <div class="container">
        <div class="row justify-content-center">
            <card-materias titulo="Titulo" :dados="materias.data"></card-materias>
            
            <!-- CARDS DE LISTAGEM -->
            <div class="col-md-2">
                <!-- Conteúdo da terceira coluna -->
                <div class="bg-info text-white p-3">
                    <h3>Terceira Coluna</h3>
                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div>
            </div>
            <paginate-component>
                <li v-for="l, key in materias.links" :key="key" class="page-item">
                    <a class="page-link" href="#">{{l}}</a>
                </li>
            </paginate-component>

        </div>
    </div>
</template>
    
<script>
    export default {
        props: ['dados'],  
    computed: {
            token() {
                let token = document.cookie.split(';').find(indice => {
                    return indice, indice.includes('token=')
                })

                token = token.split('=')[1]
                token = 'Bearer ' + token

                return token
            }
        },
    data() {
      return {
        form: {
          materia_titulo: '',
          materia_descricao: '',
          materia_imagem: [],
          materia_texto_completo: '',
          materia_data_publicacao: ''
        },
        urlBase: 'http://localhost:8000/api/v1/materia',
        errorMessage: '',
        successMessage: '',
        materias: { data: []},
        posts: {}
      };
    },
    methods: {
        getPosts(page = 1) {
            axios.get('http://localhost:8000/api/v1/materia?page=' + page)
            .then(response => {
                this.posts = response.data;
            })
        },
        carregarLista() {

            let config = {
            headers: {
                'Accept': 'application/json', //SUPORTA RETORNOS VALORES DE RESPOSTAS UTILIZANDO JSON
                'Authorization': this.token
            }
        }

            axios.get(this.urlBase, config)
            .then(response => {
                this.materias = response.data
                console.log(this.materias)
            })
            .catch(errors => {
                console.log(errors)
            })
        }
    },
    mounted() {
        this.carregarLista();
        this.getPosts();
    }
  };
</script>
    