# API Rest

<p align="center">
  <a href="http://localhost:8000/api/documentation"><img src="https://img.shields.io/badge/Documentação-304562?style=for-the-badge&logoColor=white&logo=GitBook" alt="Versão do PHP"></a>
  <a href="https://www.php.net/releases/8.3/pt_BR.php"><img src="https://img.shields.io/badge/php-8.3-df9049?style=for-the-badge" alt="Versão do PHP"></a>
  <a href="https://laravel.com/docs/11.x/releases"><img src="https://img.shields.io/badge/laravel-11-df9049?style=for-the-badge" alt="Versão do Laravel"></a>
</p>

> Este projeto, construído com Laravel, é uma API REST para demonstrar algumas funcionalidades básicas de api como autenticação jwt, get e post de dados.

## 💻 Sobre a API Rest
Este projeto simula o cadastro de alunos (nome e email) após a autentição e validação.
Ao realizar o login na rota POST e obter o token, basta passa-lo no header de cada requisição. 
Nesse projeto também foi implementado um teste utilizando o [Pest](https://pestphp.com/).

## 🚀 Instalação

Para realizar a instalação, siga estas etapas:

1 - Clone o repositório do projeto:
```bash
git clone git@github.com:miqueias91/api-rest.git
```

2 - Entre na pasta do projeto clonado:
```bash
cd api-rest
```

3 - Defina as variáveis de ambiente necessárias. Você pode fazer isso criando um arquivo .env na raiz do projeto e preenchendo-o com as variáveis necessárias. Por exemplo:
```bash
cp .env.example .env
```
Em seguida, abra o arquivo .env e preencha as variáveis de acordo com o seu ambiente.

4 - Execute o artisar serve para iniciar o servidor:
```
php artisan serve
```

## ☕ Usando a API Rest

A API será disponibilizada na porta definida no arquivo `.env`, para visuliar as rotas basta acessar o link da [documentação](http://localhost:8000/api/documentation)

## 💻 Tecnologias

- [Composer](https://getcomposer.org/)
- [Laravel](https://laravel.com)
- [MySql](https://www.mysql.com/)
- [Git](https://git-scm.com/)

## 📚 Links Úteis

- [Repositório GitHub](https://bitbucket.org/universa/api-portal/src/master)
- [Documentação oficial do Laravel](https://laravel.com/docs/11.x/readme)
- [Comunidade Laravel](https://laracasts.com/discuss)
- [Laravel Lift](https://wendell-adriel.gitbook.io/laravel-lift)
- [Laravel Validated DTO](https://wendell-adriel.gitbook.io/laravel-validated-dto)