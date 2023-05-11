<?php

namespace Controller;

use PDO;
use Model\Component;

class DetailsProduitController extends AbstractController
{
    public function getContent(): array
    {
    $componentIsValid = false;
    if (isset($_GET ['idComponent'])){
    // (Requêtes préparées) 
       // Requête category
       $id = $_GET ['idComponent'];
       $sqlCat = 'SELECT category FROM component WHERE idComponent = :idComponent';
       $statementCat = $this->db->prepare($sqlCat);
       $statementCat->bindValue(':idComponent',$id);
       $statementCat->execute();
       $category = $statementCat->fetch();
       // Requête composants
        $sql = 'SELECT * FROM component as c 
        INNER JOIN ' . $category['category'] . ' as cat ON c.idComponent = cat.idComponent
        WHERE c.idComponent = '. $id ;
        $statement = $this->db->prepare($sql);
        $class = Component::AVAILABLE_CLASSES[$category['category']];
        $statement->setFetchMode(PDO::FETCH_CLASS,$class);
        var_dump($class);
        $statement->execute();
        $component = $statement->fetch();
        var_dump($component);
        // Redirection et message d'erreur
        if(!empty($component)){
            $componentIsValid = true;
        }
        // - - - - - -
        return ['details'=>$component, 'componentIsValid'=>$componentIsValid ]; // affiche dans la vue
    }
    return ['componentIsValid'=>$componentIsValid];
   
    }
    public function getFileName(): string
    { 
    return "detailsProduit";
    }
    public function getPageTitle(): string
    { 
    return "Détails d'un produit";
    }
}
