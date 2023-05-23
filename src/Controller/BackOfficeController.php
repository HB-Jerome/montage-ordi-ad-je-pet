<?php

namespace Controller;

class BackOfficeController extends AbstractController
{
    public function getContent(): array
    {
        return [];
    }

    public function getFileName(): string
    {
        return 'backOffice';
    }

    public function getPageTitle(): string
    {
        return 'Big Brother !';
    }
}