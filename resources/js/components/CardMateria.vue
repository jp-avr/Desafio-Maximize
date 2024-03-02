<template>
    <div class="d-flex flex-wrap gap-3">
        <div v-for="materia in dados" :key="materia.materia_id" class="col-md-5">
            <div class="row g-0 border rounded overflow-hidden flex-md-row shadow-sm h-md-250 position-relative m-2">
                <div class="col p-4 d-flex flex-column position-static">
                    <h3 class="mb-0" style="font-family: Playfair Display, serif;"> {{materia.materia_titulo}} </h3>
                    <div class="mb-1 text-body-secondary">
                        {{materia.materia_data_publicacao}}
                    </div>

                    <p class="card-text mb-auto"> {{materia.materia_descricao}}</p>
                    <a :href="'/show/' + materia.materia_id" class="icon-link gap-1 icon-link-hover stretched-link">
                        Ler mais
                    </a>
                </div>
                <div class="col-auto d-none d-lg-block" style="padding-left: 0; padding-right: 0;">
                    <img :src="'storage/'+materia.materia_imagem" height="350" width="250" alt="Descrição da imagem">
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['titulo', 'descricao','dados'],
    }
</script>
