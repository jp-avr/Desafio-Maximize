<template>
    <div class="p-5">
        <card-materias titulo="Titulo" :dados="materias.data"></card-materias>
        <paginate-component>
            <li v-for="l, key in materias.links" :key="key" class="page-item">
                <a class="page-link" href="#">{{l}}</a>
            </li>
        </paginate-component>
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
