<template>
    <div>
        <button class="pagination-button" v-if="paginationLinks.prev_page_url" @click="paginacao(paginationLinks.current_page - 1)">Anterior</button>
        <button v-for="page in paginationLinks.last_page" :key="page" @click="paginacao(page)" class="pagination-button">{{ page }}</button>
        <button class="pagination-button" v-if="paginationLinks.next_page_url" @click="paginacao(paginationLinks.current_page + 1)">Próxima</button>
    </div>
</template>

<script>
    export default {
        props: ['paginationLinks','paginacao'],
    }
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
    background-color: #0DADAE;
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