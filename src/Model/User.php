<?php

namespace Model;

class User
{
    protected int $idUser;
    protected string $username;
    protected string $password;
    protected string $role;

    const CONCEPTEUR = "concepteur";
    const MONTEUR = "monteur";
    const ADMIN = "admin";

    const AVAILABLE_ROLES = [self::CONCEPTEUR, self::MONTEUR];

    public function __construct()
    {
    }
    public function getIdUser(): int
    {
        return $this->idUser;
    }

    public function setIdUser(int $idUser): self
    {
        $this->idUser = $idUser;
        return $this;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;
        return $this;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $this->password = $password;
        return $this;
    }


    public function getRole(): string
    {
        return $this->role;
    }

    public function setRole(string $role): self
    {
        $this->role = $role;
        return $this;
    }
    public function saveSession()
    {
        $_SESSION['user'] = $this;
        return $this;
    }
}