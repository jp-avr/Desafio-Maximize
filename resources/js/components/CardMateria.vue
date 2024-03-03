<template>
  <div class="row">
    <div v-for="materia in dados" :key="materia.materia_id" class="col-md-6 mb-4" >
      <div class="card h-100" data-bs-toggle="modal" data-bs-target="#modalMateria" @click="setStore(materia)">
        <div class="row no-gutters h-100">
          <div class="col-md-8">
            <div class="card-body h-100 d-flex justify-content-between flex-column">
              <div>
                <h3 class="card-title">{{ materia.materia_titulo }}</h3>
                <p class="card-subtitle mb-2 text-muted">{{ materia.created_at | formataDataTempo }}</p>
                <p class="card-subtitle mb-2">{{ materia.materia_descricao }}</p>
              </div>
              <a v-if="visualizar" class="icon-link-hover stretched-link fw-semibold">
                Ler mais
              </a>
            </div>
          </div>
          <div class="col-md-4 d-flex align-items-center">
            <img class="card-img-top img-fluid custom-img" :src="'storage/' + materia.materia_imagem" alt="Descrição da imagem">
          </div>
        </div>
      </div>
    </div>
    <modal-component id="modalMateria" titulo="Notícia" :dados="materias.data"></modal-component>
  </div>
</template>

<script>
export default {
  filters: {
        formataDataTempo(d) {
          d = d.split('T')
          
          let data = d[0]
          let tempo = d[1]
          
          data = data.split('-')
          var dia = data[2]
          var mes = data[1]
          var ano = data[0]
            
          // // Mapeando números de meses para nomes abreviados
          var mesesAbreviados = ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'];
          
          // // Obtendo o nome abreviado do mês
          var mesAbreviado = mesesAbreviados[mes - 1]; // Subtraindo 1 porque os índices de arrays começam em 0
            
          var dataFormatada = mesAbreviado + ' ' + dia;
          return dataFormatada;
        }
    },
  props: ['dados', 'titulo', 'visualizar'],  
  data() {
  return {
      urlBase: 'http://localhost:8000/api/materia',
      materias: { data: []},
  };
  },
  methods: {
      setStore(materia) {
          this.$store.state.item = materia
      },
      carregarLista() {

          axios.get(this.urlBase)
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
}
};
</script>
<style scoped>

.custom-img {
    max-width: 100%; 
    height: 100%;
    object-fit: cover;
}
</style>