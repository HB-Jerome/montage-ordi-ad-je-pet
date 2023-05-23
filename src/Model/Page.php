<?php

namespace Model;

class Page
{
    protected string $fileName;
    protected string $controller;

    protected array $roleAlowed = [];

    public function __construct(string $fileName, string $controller, $roleAlowed)
    {
        $this->fileName = $fileName;
        $this->controller = $controller;
        $this->roleAlowed = $roleAlowed;
    }

    public function getController(): string
    {
        return $this->controller;
    }

    public function getFileName(): string
    {
        return $this->fileName;
    }

    /**
     * @return 
     */
    public function getRoleAlowed(): array
    {
        return $this->roleAlowed;
    }
}