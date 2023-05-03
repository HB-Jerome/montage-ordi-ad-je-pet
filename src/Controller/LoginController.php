<?php

namespace Controller;

use PDOStatement;

class HomeController extends AbstractController
{
    public function getContent(): array
    {

        return [];
    }

    public function getFileName(): string
    {
        return 'login';
    }

    public function getPageTitle(): string
    {
        return 'Connexion';
    }
}