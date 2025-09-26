<?php

class User {
    private int $id;
    private string $name;
    private string $email;
    private string $password;

    public function __construct(int $id, string $name, string $email, string $password) {
        $this->setId($id);
        $this->setName($name);
        $this->setEmail($email);
        $this->setPassword($password);
    }

    public function getId(): int {
        return $this->id;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function setName($name): void {
        $this->name = $name;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function setEmail($email): void {
        $this->email = $email;
    }

    public function getPassword(): string {
        return $this->password;
    }

    public function setPassword($password): void {
        $this->password = $password;
    }
    
}

?>