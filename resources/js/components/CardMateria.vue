<template>
    <div class="col-md-8">
        <div v-for="materia in dados" :key="materia.materia_id">
            <div class="card col-md-5 mb-3" style="padding: 15px">
                <img :src="'storage/'+materia.materia_imagem" height="271" width="250" alt="Descrição da imagem">
                <div class="card-body">
                    <h5 class="card-title">{{materia.materia_titulo}}</h5>
                    <p class="card-text">{{materia.materia_descricao}}</p>
                    <a href="#" class="btn btn-primary">Ler Mais</a>
                </div>
            </div>
        </div>
        <!-- <div v-for="materia in dados" :key="materia.materia_id">
            <div class="card-body">
                <h5 class="card-title">{{materia.materia_titulo}}</h5>
                <p class="card-text">{{materia.materia_descricao}}</p>
                <a href="#" class="btn btn-primary">Ler Mais</a>
            </div>
        </div>
        {{ dados }} -->
    </div>
</template>

<script>
    export default {
        props: ['titulo', 'descricao','dados'],
    }
</script>
