<template>
    <div class="container">
        <div class="p-5 p-md-5 mb-4 rounded text-body-emphasis bg-body-secondary">
            <div class="col-lg-6 px-0">
                <h1 class="display-4 fw-bold" style="">Os avanços em saúde animal</h1>
                <p class="lead my-3">Exploramos o que há de mais moderno em medicina veterinária, proporcionando saúde e bem-estar aos animais.</p>
            </div>
        </div>

        <card-materias style="padding-bottom: 5rem;" id="modalMateriaVisualizar" :dados="materias.data" :visualizar="true"></card-materias>
            
        <div class="pagination-container">
            <!-- Botões de página -->
            <paginate-component :paginationLinks="materias" :paginacao="paginacao" @page-changed="carregarLista"></paginate-component>
        </div>
    </div>
</template>

<script>
import PaginateVue from './Paginate.vue';

export default {
    components:{
        PaginateVue
    },
    props: ['dados', 'titulo','paginationLinks'],  
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
    urlBase: 'http://localhost:8000/api/materia_completa',
    errorMessage: '',
    successMessage: '',
    materias: { data: []},
    posts: {}
  };
},
methods: {
    paginacao(page) {
        this.urlBase = `http://localhost:8000/api/materia_completa?page=${page}`
        this.carregarLista()
        console.log(page)
    },
    getPosts(page = 1) {
        axios.get(`http://localhost:8000/api/materia?page=${page}`)
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

<style>
.pagination-container {
    display: flex;
    justify-content: center; /* Centraliza horizontalmente */
    margin-top: 20px; /* Espaçamento superior (opcional) */
}
.pagination-button {
    padding: 0.5rem 1rem;
    margin: 0 0.5rem;
    background-color: #007bff;
    color: #ffffff;
    border: none;
    border-radius: 0.25rem;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.pagination-button:hover {
    background-color: #0056b3;
}

</style>
