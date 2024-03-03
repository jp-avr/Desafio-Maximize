<template>
    <div>
        <div class="modal fade" v-for="m in dados" :key="m.id" :id="id" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" style="padding: 2rem;">
                        <!-- <div>
                            {{ $store.state.item.created_at  | formataDataTempo }}
                        </div>
                        <div>
                            {{ $store.state.item.materia_descricao }}
                        </div>
                        <div>
                            <img :src="'storage/'+$store.state.item.materia_imagem" v-if="$store.state.item.materia_imagem" width="200" height="250">
                        </div>
                        <div>
                            {{ $store.state.item.materia_texto_completo }}
                        </div> -->
                         <h1 class="fw-bold"> {{ $store.state.item.materia_titulo }} </h1>
                         <p> {{ $store.state.item.materia_descricao }} </p>
                         <p class="text-secondary"> Última atualização em {{ $store.state.item.created_at | formataDataTempo }} </p>

                         <div>
                            <img :src="'storage/'+$store.state.item.materia_imagem" width="100%" height="auto" v-if="$store.state.item.materia_imagem">
                         </div>

                         <p style="text-align: justify; margin-top: 1rem"> {{ $store.state.item.materia_texto_completo }} </p>

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
        filters: {
        formataDataTempo(d) {
            d = d.split('T')
          
            let data = d[0]
            let tempo = d[1]
            
            //formatando as datas
            data = data.split('-')
            var dia = data[2]
            var mes = data[1]
            var ano = data[0]
                
            //Formatando o tempo
            tempo = tempo.split('.')
            tempo = tempo[0]
            console.log(tempo)

            // // Mapeando números de meses para nomes abreviados
            var mesesAbreviados = ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'];
            
            // // Obtendo o nome abreviado do mês
            var mesAbreviado = mesesAbreviados[mes - 1]; // Subtraindo 1 porque os índices de arrays começam em 0
                
            var dataFormatada = mesAbreviado + ' ' + dia + ' às ' + tempo;
            return dataFormatada;
        }
    },
        props: ['id', 'dados', 'titulo']
    }
</script>
