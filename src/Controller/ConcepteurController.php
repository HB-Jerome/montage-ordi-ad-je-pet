<?php
namespace Controller;

use PDO;

class ConcepteurController extends AbstractController
{
    public function getContent(): array
    {

        return [];
    }

    public function getFileName(): string
    {
        return 'concepteur';
    }

    public function getPageTitle(): string
    {
        return 'Concepteur';
    }
}