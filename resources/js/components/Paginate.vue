<template>
    <div>
        <button class="pagination-button" v-if="paginationLinks.prev_page_url" @click="paginacao(paginationLinks.current_page - 1)">Anterior</button>
        <button v-for="page in paginationLinks.last_page" :key="page" @click="paginacao(page)" class="pagination-button">{{ page }}</button>
        <button class="pagination-button" v-if="paginationLinks.next_page_url" @click="paginacao(paginationLinks.current_page + 1)">Próxima</button>
    </div>
</template>

<script>
import MateriaVue from './Materia.vue'

    export default {
        components: {
            MateriaVue
        },
        props: ['paginationLinks','paginacao'],
    }
</script>