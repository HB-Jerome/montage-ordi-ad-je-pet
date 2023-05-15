<?php

namespace Controller;

use Model\Component;


class ModificationPieceController extends AbstractController
{
    public function getContent(): array
    {
        
        return [];
    }

    public function getFileName(): string
    {
        return 'modificationPiece';
    }

    public function getPageTitle(): string
    {
        return 'Mofication de Piece !';
    }
}