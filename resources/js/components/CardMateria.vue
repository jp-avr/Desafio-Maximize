<template>
    <div class="row">
        <div v-for="materia in dados" :key="materia.materia_id" class="col-md-6">
            <div class="row g-0 border rounded overflow-hidden flex-md-row shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                    <h3 class="mb-0"> {{materia.materia_data_publicacao}} </h3>
                    <div class="mb-1 text-body-secondary">{{materia.materia_descricao}}</div>
                    <p class="card-text mb-auto"> {{materia.materia_descricao}}</p>
                    <a href="#" v-if="visualizar" class="icon-link gap-1 icon-link-hover stretched-link" data-toggle="modal" data-target="#modalMateria" @click="setStore(materia)">
                        Continue reading
                        <svg class="bi"><use xlink:href="#chevron-right"/></svg>
                    </a>
                </div>
                <div class="col-auto d-none d-lg-block" style="padding-left: 0; padding-right: 0;">
                    <img class="bd-placeholder-img" :src="'storage/'+materia.materia_imagem" width="200" height="250" alt="Descrição da imagem">
                </div>
            </div>
        </div>   
        

        <modal-component id="modalMateria" titulo="Notícia" :dados="materias.data"></modal-component>

    </div>
</template>

<script>
export default {
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
