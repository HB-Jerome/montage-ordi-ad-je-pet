<?php

namespace Model;

class Page
{
    protected string $fileName;
    protected string $controller;

    public function __construct(string $fileName, string $controller)
    {
        $this->fileName = $fileName;
        $this->controller = $controller;
    }

    public function getController(): string
    {
        return $this->controller;
    }

    public function getFileName(): string
    {
        return $this->fileName;
    }
}