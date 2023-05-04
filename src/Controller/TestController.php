<?php
namespace Controller;

use PDO;

class TestController extends AbstractController
{
    public function getContent(): array
    {

        return [];
    }

    public function getFileName(): string
    {
        return 'test';
    }

    public function getPageTitle(): string
    {
        return 'Bienvenue !';
    }
}