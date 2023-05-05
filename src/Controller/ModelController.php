<?php

namespace Controller;


class ModelController extends AbstractController
{
    public function getContent(): array
    {

        return [];
    }

    public function getFileName(): string
    {
        return 'model';
    }

    public function getPageTitle(): string
    {
        return 'Creation modèle !';
    }
}