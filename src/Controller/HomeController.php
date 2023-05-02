<?php

namespace Controller;

use Service\BeanieFactory;
use PDOStatement;

class HomeController extends AbstractController
{
    public function getContent(): array
    {

        return [];
    }

    public function getFileName(): string
    {
        return 'home';
    }

    public function getPageTitle(): string
    {
        return 'Bienvenue !';
    }
}