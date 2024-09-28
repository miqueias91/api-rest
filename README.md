# API Rest

<p align="center">
  <a href="http://localhost:8000/api/documentation"><img src="https://img.shields.io/badge/Documentação-304562?style=for-the-badge&logoColor=white&logo=GitBook" alt="Versão do PHP"></a>
  <a href="https://www.php.net/releases/8.3/pt_BR.php"><img src="https://img.shields.io/badge/php-8.3-df9049?style=for-the-badge" alt="Versão do PHP"></a>
  <a href="https://laravel.com/docs/11.x/releases"><img src="https://img.shields.io/badge/laravel-11-df9049?style=for-the-badge" alt="Versão do Laravel"></a>
</p>

> Este projeto é uma API RESTful construída com Laravel, demonstrando funcionalidades essenciais, como autenticação JWT e operações CRUD (GET, POST, DELETE e PUT) para gerenciamento de dados.

## 💻 Sobre a API Rest
A API simula o cadastro, listagem, atualização e exclusão de alunos, permitindo que você realize essas operações após realizar a autenticação e validação.
Além disso, o projeto inclui um teste implementado utilizando o [Pest](https://pestphp.com/) para validar funcionalidades críticas da aplicação.

## 🚀 Instalação

Siga os passos abaixo para configurar e executar a API em seu ambiente local:

1 - Clone o repositório do projeto:

```bash
git clone git@github.com:miqueias91/api-rest.git
```

2 - Entre na pasta do projeto clonado:

```bash
cd api-rest
```

3 - Copie o arquivo de variáveis de ambiente e configure-o de acordo com seu ambiente:

```bash
cp .env.example .env
```
Abra o arquivo .env e preencha as variáveis necessárias, como conexão com o banco de dados e chaves de API.

4 - Instale as dependências do projeto com o Composer:

```bash
composer install
```

5 - Execute as migrações para criar as tabelas no banco de dados:

```bash
php artisan migrate
```

6 - Inicie o servidor local com o Artisan:

```bash
php artisan serve
```
A API estará disponível na porta definida no arquivo .env. Para visualizar as rotas disponíveis, acesse a documentação da API.

## ☕ Usando a API Rest

Após configurar o projeto e iniciar o servidor, você pode usar ferramentas como Postman ou cURL para testar as funcionalidades da API. Não se esqueça de enviar o token JWT no header para as rotas protegidas.

## 💻 Tecnologias

- PHP
- Laravel
- MySQL
- Git
- Composer
- Pest (para testes)

## 📚 Links Úteis

- [Repositório GitHub](https://bitbucket.org/universa/api-portal/src/master)
- [Documentação oficial do Laravel](https://laravel.com/docs/11.x/readme)
- [Comunidade Laravel](https://laracasts.com/discuss)
- [Laravel Lift](https://wendell-adriel.gitbook.io/laravel-lift)
- [Laravel Validated DTO](https://wendell-adriel.gitbook.io/laravel-validated-dto)