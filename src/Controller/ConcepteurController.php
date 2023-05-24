<?php
namespace Controller;

use PDO;

class ConcepteurController extends AbstractController
{
    public function getContent(): array
    {
        $sql = "SELECT comment.* FROM comment LEFT JOIN users ON comment.idUser=users.idUser WHERE messageSeen =false AND users.role='monteur' ORDER BY commentDate DESC";

        $statement = $this->db->prepare($sql);
        $statement->execute();
        $results = $statement->fetchAll();

        // var_dump($results);
        return ["results"=>$results];
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