<?php

class Validator {
    public function validateEmail(string $email): bool {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }

    public function validatePassword(string $password): bool {
        return preg_match('/^(?=.*[0-9])(?=.*[A-Z]).{8,}$/', $password);
    }
}

?>