## Sobre o projeto
- Este projeto fora criado como um teste para a vaga de Desenvolvedor Back End na MAXIMIZE.
- Esta aplicação visa a criação de um Feed de notícias utilizando uma API.
- A aplicação está utilizando Laravel 7.x e PHP 7.3.33.

## Como rodar o projeto
- Após clonar o projeto utilizar os comandos:
1 - composer require laravel/ui^2.4
2 - php artisan ui vue --auth
3 - npm install
4 - npm run dev

## Database
- Criar em seu localhost uma nova Database
- Em seguida coloque o nome da Database criada no seu .env no campo 'DB_DATABASE' da seguinte forma: 

![alt text](image.png)

- Rodar o comando 'php artisan migrate:fresh --seed' para puxar localmente todas as tabelas do banco.

