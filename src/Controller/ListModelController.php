<?php

namespace Controller;


class ListModelController extends AbstractController
{
    public function getContent(): array
    {


        return [];
    }

    public function getFileName(): string
    {
        return 'ListModel';
    }

    public function getPageTitle(): string
    {
        return 'Liste des Modeles !';
    }
    public function getModels()
    {
        $sql = 'SELECT * FROM ModelPc';

    }
}