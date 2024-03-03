# Sobre o Projeto

Este projeto foi desenvolvido como parte de um teste para a vaga de Desenvolvedor Back End na [MAXIMIZE](https://maximize.com.br/). A aplicação tem como objetivo criar um feed de notícias utilizando uma API. Foi construída utilizando Laravel 7.x e PHP 7.3.33.

## Pré-requisitos

Para executar este projeto, você precisará ter instalado em seu ambiente:

- PHP 7.3.33
- Composer
- Node.js 20.10.0 (ou versões mais recentes)
- MySQL

## Configuração do Banco de Dados

Se estiver utilizando o WampServer ou uma configuração similar para rodar localmente, siga estas instruções:

1. Crie uma nova base de dados em seu localhost.
2. No arquivo `.env`, configure o nome da base de dados no campo `DB_DATABASE`.
3. Execute o comando `php artisan migrate:fresh --seed` para criar e popular as tabelas no banco de dados.

## Tecnologias Utilizadas

O projeto faz uso das seguintes tecnologias:

- Laravel: Framework Back-End
- Vue.js: Framework Front-End
- MySQL: Banco de dados

## Como Rodar o Projeto

Para executar o projeto localmente, siga as instruções abaixo:

1. Clone o repositório do projeto.
2. Execute os seguintes comandos:

```bash
composer require laravel/ui:^2.4
npm install
npm run dev # para ambiente de desenvolvimento ou npm run production para produção
php artisan storage:link # cria um link para o local onde as imagens estão sendo salvas
composer require tymon/jwt-auth # para autenticação via token
```

3. Caso o arquivo `.env` não exista, crie-o na raiz do projeto.
4. Execute o comando `php artisan jwt:secret` para gerar uma chave de token no arquivo `.env`.
5. Execute o comando `php artisan migrate:fresh --seed` para criar e popular as tabelas no banco de dados.
6. Execute o comando `php artisan serve` para iniciar o servidor e rodar o projeto.

Observação: Se estiver utilizando o Google Chrome como navegador de desenvolvimento, é recomendável instalar a extensão Vue.js para uma melhor experiência de depuração. Você pode encontrar a extensão [aqui](https://devtools.vuejs.org/guide/installation.html).

## Credenciais de Acesso

Após rodar `php artisan migrate:fresh --seed`, vá diretamente para a rota [Login](http://localhost:8000/login) e acesse com o seguinte usuário:

- **Login:** dev@dev.com
- **Senha:** 123

## Autor

**João Pedro** - [GitHub](https://github.com/jp-avr)

## Referências

- Documentação do Laravel: [https://laravel.com/docs/7.x](https://laravel.com/docs/7.x)
- Documentação do Vue.js: [https://vuejs.org/](https://vuejs.org/)
- Documentação do MySQL: [https://www.mysql.com/](https://www.mysql.com/)
- Documentação do JWT Auth para Laravel: [https://jwt-auth.readthedocs.io/en/develop/laravel-installation/](https://jwt-auth.readthedocs.io/en/develop/laravel-installation/)

