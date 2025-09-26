<?php

require_once 'src/User.php';
require_once 'src/Validator.php';
require_once 'src/UserManager.php';

$initialUsers = [
    [
        'id' => 1,
        'nome' => 'João Silva',
        'email' => 'joao@email.com',
        'senha' => password_hash('SenhaForte1', PASSWORD_BCRYPT)
    ]
];

$userManager = new UserManager($initialUsers);

echo "Cenário 1: Cadastro de usuário válido<br>";
$result = $userManager->register('Maria Oliveira', 'maria@email.com', 'Senha123');
if ($result === null) {
    echo "SUCESSO! Usuário cadastrado com sucesso.<br>";
} else {
    echo "ERRO! Falha no cadastro: {$result}<br>";
}

echo "<br>Cenário 2: Cadastro com e-mail inválido<br>";
$result = $userManager->register('Pedro', 'pedro@@email', 'Senha123');
if ($result === null) {
    echo "SUCESSO! Usuário cadastrado com sucesso.<br>";
} else {
    echo "ERRO! Falha no cadastro: {$result}<br>";
}

echo "<br>Cenário 3: Tentativa de login com senha errada<br>";
$result = $userManager->login('joao@email.com', 'Errada123');
if ($result === null) {
    echo "SUCESSO! Login realizado com sucesso.<br>";
} else {
    echo "ERRO! Falha no login: {$result}<br>";
}

echo "<br>Cenário 4: Reset de senha válido<br>";
$result = $userManager->resetPassword(1, 'NovaSenha1');
if ($result === null) {
    echo "SUCESSO! Senha do usuário alterada com sucesso.<br>";
} else {
    echo "ERRO! Falha ao resetar senha: {$result}<br>";
}

echo "<br>Cenário 5: Cadastro de usuário com e-mail duplicado<br>";
$result = $userManager->register('João Duplicado', 'joao@email.com', 'OutraSenha45');
if ($result === null) {
    echo "SUCESSO! Usuário cadastrado com sucesso.";
} else {
    echo "ERRO! Falha no cadastro: {$result}";
}

?>