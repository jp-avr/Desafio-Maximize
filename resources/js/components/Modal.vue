<template>
    <div>
        <div class="modal fade" v-for="m in dados" :key="m.id" :id="id" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{ $store.state.item.materia_titulo }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div>
                            {{ $store.state.item.materia_data_publicacao }}
                            {{ $store.state.item.materia_texto_completo }}
                        </div>
                        <div>
                            {{ $store.state.item.materia_descricao }}
                        </div>
                        <div>
                            <img :src="'storage/'+$store.state.item.materia_imagem" width="200" height="250">
                        </div>
                        <div>
                            {{ $store.state.item.materia_texto_completo }}
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['id', 'dados', 'titulo']
    }
</script>
