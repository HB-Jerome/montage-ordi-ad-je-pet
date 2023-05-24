<?php
namespace Controller;

use Model\Comment;
use PDO;

class ConcepteurController extends AbstractController
{
    public function getContent(): array
    {
        $sql = "SELECT comment.*, users.username FROM comment LEFT JOIN users ON comment.idUser = users.idUser WHERE users.role = 'monteur' GROUP BY `comment`.`idComment` ORDER BY commentDate DESC";

        $statement = $this->db->prepare($sql);
        $statement->setFetchMode(PDO::FETCH_CLASS, Comment::class);
        $statement->execute();
        $results = $statement->fetchAll();



        // var_dump($results);
        return ["results" => $results];
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