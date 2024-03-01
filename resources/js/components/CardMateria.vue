<template>
    <div class="col-md-8">
        <div class="card col-md-5 mb-3" style="padding: 15px">
            <img src="" height="200" width="400" alt="Descrição da imagem">
            <div class="card-body">
                <h5 class="card-title">{{titulo}}</h5>
                <p class="card-text">{{descricao}}</p>
                <a href="#" class="btn btn-primary">Ler Mais</a>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['titulo', 'descricao']
    }
</script>
