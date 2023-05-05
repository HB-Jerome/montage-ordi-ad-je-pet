<?php
namespace Controller;

use PDO;

class ListPieceController extends AbstractController
{
    public function getContent(): array
    {
<<<<<<< HEAD
        $sql = "SELECT * FROM component";
        $statement = $this->db->prepare($sql);
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);

        return ["results" => $results];
=======

        return [];
>>>>>>> 21e96b9 (for git pull)
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