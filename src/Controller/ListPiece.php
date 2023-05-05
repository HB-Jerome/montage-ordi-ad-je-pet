<?php
namespace Controller;

use PDO;

class ListPiece extends AbstractController
{
    public function getContent(): array
    {

        return [];
    }

    public function getFileName(): string
    {
        return 'listPiece';
    }

    public function getPageTitle(): string
    {
        return 'List of Products available';
    }
}