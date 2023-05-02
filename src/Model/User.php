<?php

namespace Model;

class User
{
    protected int $Id_users;
    protected string $username;
    protected string $password;
    protected string $role;

    public function __construct($Id_users, $username, $password, $role)
    {
        $this->Id_users = $Id_users;
        $this->username = $username;
        $this->password = $password;
        $this->role = $role;

    }
    public function getId_users(): int
    {
        return $this->Id_users;
    }

    public function setId_users(int $Id_users): self
    {
        $this->Id_users = $Id_users;
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
}