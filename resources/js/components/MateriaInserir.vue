<template>
  <div>
    <h2>Formulário de Matéria</h2>

    <div v-if="errorMessage" v-html="errorMessage" class="error-message"></div>
    <div v-if="successMessage" class="success-message">{{ successMessage }}</div>

      <div>
        <label for="titulo">Título da Matéria:</label>
        <input type="text" id="titulo" v-model="form.materia_titulo" required>
      </div>
      <div>
        <label for="descricao">Descrição da Matéria:</label>
        <input type="text" id="descricao" v-model="form.materia_descricao" required>
      </div>
      <div>
        <label for="imagem">Imagem:</label>
        <input type="file" id="imagem" @change="carregarImagem($event)" accept="image/*" required>
      </div>
      <div>
        <label for="textoCompleto">Texto Completo:</label>
        <textarea id="textoCompleto" v-model="form.materia_texto_completo" required></textarea>
      </div>
      <div>
        <label for="dataPublicacao">Data de Publicação:</label>
        <input type="date" id="dataPublicacao" v-model="form.materia_data_publicacao" required>
      </div>
      <button type="submit" @click="salvar()">Enviar</button>

  </div>
</template>

<script>
export default {
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
      successMessage: ''
    };
  },
  methods: {

    carregarImagem(e) {
      this.form.materia_imagem = e.target.files;
    },
    salvar() { 
      // Envie os dados do formulário para o servidor aqui
      console.log(this.form.materia_titulo, this.form.materia_imagem);

      const formData = new FormData(); //FORMDATA serve para instanciar um formulário para poder escolher seus atributos
      formData.append('materia_titulo', this.form.materia_titulo); //Atribuir valores ao formulário
      formData.append('materia_descricao', this.form.materia_descricao);
      formData.append('materia_imagem', this.form.materia_imagem[0]);
      formData.append('materia_texto_completo', this.form.materia_texto_completo);
      formData.append('materia_data_publicacao', this.form.materia_data_publicacao);

      let config = {
          headers: {
              'Content-Type': 'multipart-form-data', //Escolhendo o tipo de conteúdo da nossa requisição (igual ao Postman)
              'Accept': 'application/json', //SUPORTA RETORNOS VALORES DE RESPOSTAS UTILIZANDO JSON
              'Authorization': this.token
          }
      }
      
      // Aqui você pode usar Axios ou outra biblioteca para enviar os dados para o servidor
      axios.post(this.urlBase, formData, config)
        .then(response => {
          console.log(response.data);
          this.successMessage = 'Notícia cadastrada com sucesso!';
          // Limpar o formulário ou fazer outras ações necessárias após o envio bem-sucedido
          this.clearForm();
        })
        .catch(error => {
          if (error.response && error.response.status === 422 && error.response.data.errors) {
              // Se houver erros de validação, atualize o estado do componente com as mensagens de erro
              this.Error();
              this.errorMessage = Object.values(error.response.data.errors).join('.'+'<br>');
              
          } else {
              this.errorMessage = 'Ocorreu um erro ao enviar o formulário.';

          }
          console.error(error);
        });
    },
    clearForm() {
      // Limpar o formulário após o envio bem-sucedido
      this.form.materia_titulo = '';
      this.form.materia_descricao = '';
      this.form.materia_imagem = [];
      this.form.materia_texto_completo = '';
      this.form.materia_data_publicacao = '';
      this.errorMessage = '';
  },
  Error() {
    this.successMessage = '';
  }
  }
};
</script>

<style>
.error-message {
color: red;
}

.success-message {
  color: green;
  margin-top: 10px;
  font-weight: bold;
}
</style>