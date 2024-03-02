<template>
    <div class="container">
        <div class="p-5 p-md-5 mb-4 rounded text-body-emphasis bg-body-secondary">
            <div class="col-lg-6 px-0">
                <h1 class="display-4 fst-italic" style="">Descubra os avanços em saúde animal</h1>
                <p class="lead my-3">Exploramos o que há de mais moderno em medicina veterinária, proporcionando saúde e bem-estar aos animais.</p>
                <p class="lead mb-0"><a href="#" class="text-body-emphasis fw-bo    ld">Continue lendo...</a></p>
            </div>
        </div>

        <card-materias id="modalMateriaVisualizar" :dados="materias.data" :visualizar="true"></card-materias>

        
    </div>
</template>

<script>
export default {
    props: ['dados', 'titulo'],  
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
    urlBase: 'http://localhost:8000/api/materia',
    errorMessage: '',
    successMessage: '',
    materias: { data: []},
    posts: {}
  };
},
methods: {
    getPosts(page = 1) {
        axios.get('http://localhost:8000/api/materia?page=' + page)
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
