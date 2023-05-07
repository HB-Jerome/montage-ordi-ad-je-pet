<?php

namespace Controller;


class ModelCreationController extends AbstractController
{
    public function getContent(): array
    {


        return [];
    }

    public function getFileName(): string
    {
        return 'ModelCreation';
    }

    public function getPageTitle(): string
    {
        return 'Creation modèle !';
    }
}