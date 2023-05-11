<?php

namespace Controller;

use Model\Component;


class ModificationPieceController extends AbstractController
{
    public function getContent(): array
    {
        $this->handleGet($_GET);
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
    public function handleGet($getData)
    {
        if (isset($getData['component'])) {
            $id = $getData['component'];
            $sql = 'SELECT idComponent, category FROM component WHERE idComponent = :idComponent';

            $statement = $this->db->prepare($sql);
            $statement->bindValue(":idComponent", $id);
            $statement->execute();
            $statement->execute();
            $result = $statement->fetch();
            var_dump($result);

            $category = $result['category'];
            // $class = 
        }

    }

}