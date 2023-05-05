<?php
spl_autoload_register(function ($class) {
    require_once "../src/$class.php";
});
include "../includes/config.inc.php";


// on inclut la class MotherBoard pour créer les objects
use Model\MotherBoard;

$des1 = "Prête à accueillir les processeurs AMD Ryzen de 3ème génération (nom de Core Matisse), la carte mère ASUS TUF GAMING B550-PLUS est idéale pour concevoir un PC Gaming performant et équilibré. Le support du PCI-Express 4.0 vous emmène vers de nouveaux sommets.";
$des2 = "Prête à accueillir les processeurs AMD Ryzen à partir de la 3ème génération, la carte mère ASUS ROG STRIX B550-F GAMING (WI-FI) II est idéale pour concevoir un PC Gaming performant et équilibré. Le support du PCI-Express 4.0 vous emmène vers de nouveaux sommets.";
$des3 = "La carte mère ASUS ROG STRIX B760-F GAMING WIFI est conçue pour accueillir les processeurs Intel Core hybrides de 12ème et 13ème génération sur socket Intel LGA 1700. Elle sera la base de choix pour une configuration axée sur les performances et la productivité.";



// on crée un tableau d'objet basé sur la class MotherBoard

$motherBoards = [
    (new MotherBoard())

        // propriétés communes à tous les composants
        ->setName("ASUS TUF GAMING B550-PLUS")
        ->setBrand("ASUS")
        ->setDescription($des1)
        ->setPrice(159)
        ->setPcType("fixe")
        ->setIsArchived(false)

        // propriétés spécifiques à MotherBoard
        ->setSocket("AMD B550")
        ->setFormat("ATX"),

    (new MotherBoard())
        // propriétés communes à tous les composants
        ->setName("ASUS ROG STRIX B550-F GAMING (WI-FI) II")
        ->setBrand("ASUS")
        ->setDescription($des2)
        ->setPrice(219)
        ->setPcType("fixe")
        ->setIsArchived(false)

        // propriétés spécifiques à MotherBoard
        ->setSocket("AMD B550")
        ->setFormat("ATX"),

    (new MotherBoard())
        // propriétés communes à tous les composants
        ->setName("ASUS ROG STRIX B760-F GAMING WIFI")
        ->setBrand("ASUS")
        ->setDescription($des3)
        ->setPrice(286)
        ->setPcType("fixe")
        ->setIsArchived(false)

        // propriétés spécifiques à MotherBoard
        ->setSocket("Intel B760 Express")
        ->setFormat("ATX"),
];

// on prépare l'insertion des propriétés communnes dans la table parent
$sqlParent = "INSERT INTO component (name,brand,description,price,pcType,isArchived) VALUES (:name,:brand,:description,:price,:pcType,false)";
// on prepare l'insertion des propriétés spécifiques dans la table enfant
$sqlChild = "INSERT INTO MotherBoard (idComponent,socket,format) VALUES (:idComponent,:socket,:format)";


foreach ($motherBoards as $motherBoard) {
    $db->beginTransaction();
    $statement = $db->prepare($sqlParent);
    $statement->bindValue(":name", $motherBoard->getName(),PDO::PARAM_STR);
    $statement->bindValue(":brand", $motherBoard->getBrand(),PDO::PARAM_STR);
    $statement->bindValue(":description", $motherBoard->getDescription(),PDO::PARAM_STR);
    $statement->bindValue(":price", $motherBoard->getPrice());
    $statement->bindValue(":pcType", $motherBoard->getPrice(),PDO::PARAM_STR);
    $statement->execute();
    // insertion des propriétés communes dans la table parent

    $id = $db->lastInsertId();
    // on recupère l'id du composant dans la table parent
    $id = intval($id);
    $statement = $db->prepare($sqlChild);
    $statement->bindValue(":idComponent", $id); //on utilise id du parent comme identifiant dans la table enfant
    $statement->bindValue(":socket", $motherBoard->getSocket(),PDO::PARAM_STR);
    $statement->bindValue(":format", $motherBoard->getFormat(),PDO::PARAM_STR);
    $statement->execute();
    // insertion des propriétés spécifiques dans la table enfant
    $db->commit();
}
