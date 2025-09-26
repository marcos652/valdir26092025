# Valdir-23-09-2025
# Gerenciamento de Usuários em PHP

Este projeto é um exemplo simples de gerenciamento de usuários em PHP, com foco em boas práticas, validação de dados e organização em classes.

## 📂 Estrutura do Projeto

```
.
├── index.php
└── src
    ├── User.php
    ├── UserManager.php
    └── Validator.php
```

* **`User.php`** → Classe que representa um usuário.
* **`Validator.php`** → Classe responsável por validar e-mail e senha.
* **`UserManager.php`** → Classe que gerencia usuários (cadastrar, listar, buscar).
* **`index.php`** → Arquivo principal que simula o uso do sistema.

## 🚀 Funcionalidades

* Cadastro de usuários com validação de:

  * **E-mail válido**
  * **Senha forte** (mínimo 8 caracteres, contendo letras maiúsculas, minúsculas e números)
* Listagem de usuários cadastrados
* Busca de usuário por **e-mail**

## 🛠️ Tecnologias Utilizadas

* PHP 8+
* `password_hash` para armazenamento seguro de senhas

## ▶️ Como Executar

1. Clone o repositório ou baixe os arquivos.
2. Coloque o projeto em um servidor PHP local (ex: [XAMPP](https://www.apachefriends.org/), [Laragon](https://laragon.org/) ou `php -S localhost:8000`).
3. Abra o arquivo `index.php` no navegador:

```bash
php -S localhost:8000
```

E depois acesse em: [http://localhost:8000/index.php](http://localhost:8000/index.php)

## 📌 Exemplo de Uso

No `index.php`, já existe um cenário configurado:

```php
$initialUsers = [
    [
        'id' => 1,
        'nome' => 'João Silva',
        'email' => 'joao@email.com',
        'senha' => password_hash('SenhaForte1', PASSWORD_BCRYPT)
    ]
];

$userManager = new UserManager($initialUsers);

$userManager->listarUsuarios();

$user = $userManager->buscarPorEmail('joao@email.com');
```


nome: marcos vinicius da silva ra: 1997272
nome: lucas nunes alves da silva ra:1996656
