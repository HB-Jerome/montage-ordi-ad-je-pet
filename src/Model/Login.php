<?php

namespace Model;

class Login
{

    protected ?string $username = null;

    protected ?string $password = null;

    protected ?array $errors = [];

    public function __construct($postData)
    {

        if (isset($postData['username'])) {
            $this->setUsername(trim($postData['username']));
        }
        if (isset($postData['password'])) {
            $this->setPassword(trim($postData['password']));
        }
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }
    public function setUsername(?string $username): self
    {
        if (empty($username) || ctype_space($username)) {
            $this->errors[] = "Le nom d'utilisateur doit être renseingé";
        }
        $this->username = $username;
        return $this;
    }

    public function getPassword(): ?string
    {

        return $this->password;
    }
    public function setPassword(?string $password): self
    {
        if (empty($password) || ctype_space($password)) {
            $this->errors[] = "Le mot de passe doit être renseingé";
        }
        $this->password = $password;
        return $this;
    }
    public function getErrors(): ?array
    {
        return $this->errors;
    }
    public function setErrors(?array $errors): self
    {
        $this->errors = $errors;
        return $this;
    }
    public function addError(?string $error): self
    {
        $this->errors[] = $error;
        return $this;
    }
    public function isValid()
    {
        if (empty($this->errors)) {
            return true;
        } else
            return false;
    }
    public function isSubmited()
    {
        if (!empty($this->username) || !empty($this->password) || !empty($this->errors)) {
            return true;
        } else
            return false;
    }


}