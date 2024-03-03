## Histórico
- O começo foi a parte mais simples, criar os Controllers, as Rotas, os Models e as Migrations para a aplicação
- A construção de API essencialmente era para ser bem simples com somente 2 métodos, mas eu achei interessante colocar todos (index, show, store, update, destroy)
- A API se mostrou funcional, está retornando e recebendo dados.
- Pesquisei um método de acesso via token para acesso de rotas e encontrei o JWT
- Passar os parâmetros do JWT para a aplicação com Vue.js me requeriu um tempo de pesquisa
- Como não era um projeto complexo decidi utilizar o Vue.js
- As partes de componentização e conexão direta com a API se mostraram um pouco dificeis, mas após pesquisas consegui componentizar as telas principais e criar a conexão
- Após componentizar e criar componentes no Vue.js chegou a parte da estilização da tela principal
- Me baseando na imagem enviada criei um site de noticias que recebe dados da API e os mostra na tela principal para todos lerem
- Devido ao fato do redirecionamento de tela exigir muitos cliques do usuário optei pela criação de um Modal que retorna todos os dados da respectiva notícia
- Por causa do Modal de notícias o usuário poderá ler a noticia completa e ao clicar fora da tela já poderá clicar em outra notícia mais rapidamente

## Ideias para implementar
- Caso eu possuísse mais tempo gostaria de ter implementado com Vue Router e com o Vuex uma aplicação completa com redirecionamentos e permissões de Administrador e de usuário
- Com o Vue router seria possível o redirecionamento para outros componentes com os dados enviados, e o Vuex serve para manter os dados possíveis de serem pegos em qualquer Componente sem a necessidade de passar via props
- Adicionar mais efeitos de suavização nos elementos do front e animações.

## Modificações
- A ideia era utilizar somente o Laravel com o Blade, mas como o nome sugere um Desafio decidi utilizar o Vue.js, já que não é um recurso que todos possuem conhecimento.
- Devido ao Vue.js fui forçado a pesquisar diferentes documentações e aprender coisas interessantes para usar em meus projetos, fora o reforço na base de JavaScript.
- A alteração da imagem de capa da notícia foi alterada de opcional para obrigatória, pois uma notícia sem imagens não chamaria a atenção do leitor.