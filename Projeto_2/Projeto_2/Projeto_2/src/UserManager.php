<?php

declare(strict_types=1);

require_once 'Validator.php';

class UserManager
{
    private array $users = [];
    private Validator $validator;
    private int $nextId = 1;

    public function __construct(array $initialUsers = [])
    {
        foreach ($initialUsers as $user) {
            $this->users[$user['id']] = $user;

            if ($user['id'] >= $this->nextId) {
                $this->nextId = $user['id'] + 1;
            }
        }

        $this->validator = new Validator();
    }

    public function register(string $name, string $email, string $password): ?string
    {
        if (!$this->validator->validateEmail($email)) {
            return 'E-mail inválido.';
        }

        if (!$this->validator->validatePassword($password)) {
            return 'A senha precisa ter no mínimo 8 caracteres, pelo menos 1 número e 1 letra maiúscula.';
        }

        if ($this->findUserByEmail($email)) {
            return 'E-mail já está em uso.';
        }

        $this->users[$this->nextId] = [
            'id' => $this->nextId,
            'nome' => $name,
            'email' => $email,
            'senha' => $this->hashPassword($password)
        ];

        $this->nextId++;

        return null;
    }

    public function login(string $email, string $password): ?string
    {
        if (!$this->validator->validateEmail($email)) {
            return 'E-mail inválido.';
        }

        $user = $this->findUserByEmail($email);

        if (!$user || !password_verify($password, $user['senha'])) {
            return 'Credenciais inválidas.';
        }

        return null;
    }

    public function resetPassword(string $email, string $newPassword): ?string
    {
        if (!$this->validator->validateEmail($email)) {
            return 'E-mail inválido.';
        }

        $user = $this->findUserByEmail($email);

        if (!$user) {
            return 'Usuário não encontrado.';
        }

        if (!$this->validator->validatePassword($newPassword)) {
            return 'A nova senha precisa ter no mínimo 8 caracteres, pelo menos 1 número e 1 letra maiúscula.';
        }

        $this->users[$user['id']]['senha'] = $this->hashPassword($newPassword);

        return null;
    }

    private function findUserByEmail(string $email): ?array
    {
        foreach ($this->users as $user) {
            if ($user['email'] === $email) {
                return $user;
            }
        }

        return null;
    }

    private function hashPassword(string $password): string
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }
}
