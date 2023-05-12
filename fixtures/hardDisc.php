<?php

// on inclut la class HardDisc pour créer les objects
use Model\HardDisc;

$des1 = "Optez pour une grande capacité de stockage avec le disque dur Seagate BarraCuda 2 To. Cette gamme domine le marché en proposant les meilleures capacités pour les ordinateurs de bureau et périphériques mobiles. Ces disques conviennent parfaitement aux mises à niveau et à tous les budgets.";
$des2 = "Optez pour une grande capacité de stockage avec le disque dur Seagate BarraCuda 4 To. Cette gamme domine le marché en proposant les meilleures capacités pour les ordinateurs de bureau et périphériques mobiles. Ces disques conviennent parfaitement aux mises à niveau et à tous les budgets.";
$des3 = "Optez pour une grande capacité de stockage avec le disque dur Seagate BarraCuda 1 To. Cette gamme domine le marché en proposant les meilleures capacités pour les ordinateurs de bureau et périphériques mobiles. Ces disques conviennent parfaitement aux mises à niveau et à tous les budgets.";



// on crée un tableau d'objet basé sur la class HardDisc

$hardDiscs = [
    (new HardDisc())

        // propriétés communes à tous les composants
        ->setName("Seagate BarraCuda 2 To (ST2000DM008)")
        ->setBrand("Seagate Technology")
        ->setDescription($des1)
        ->setPrice(63)
        ->setComponentType("fixe")
        ->setIsArchived(false)

        ->setDiscCapacity(2)
        ->setSsd(false),

    (new HardDisc())
        // propriétés communes à tous les composants
        ->setName("Seagate BarraCuda 4 To (ST4000DM004)")
        ->setBrand("Seagate Technology")
        ->setDescription($des2)
        ->setPrice(96)
        ->setComponentType("fixe")
        ->setIsArchived(false)

        // propriétés spécifiques à HardDisc
        ->setSsd(false)
        ->setDiscCapacity(4),

    (new HardDisc())
        // propriétés communes à tous les composants
        ->setName("Seagate BarraCuda 1 To (ST1000DM010)")
        ->setBrand("Seagate Technology")
        ->setDescription($des3)
        ->setPrice(49)
        ->setComponentType("fixe")
        ->setIsArchived(false)

        // propriétés spécifiques à HardDisc

        ->setSsd(false)
        ->setDiscCapacity(1)
];

// on prépare l'insertion des propriétés communnes dans la table parent
$sqlParent = "INSERT INTO Component (name,brand,description,price,componentType,isArchived,category,quantity) VALUES (:name,:brand,:description,:price,:componentType,false,:category,26)";
// on prepare l'insertion des propriétés spécifiques dans la table enfant
$sqlChild = "INSERT INTO HardDisc (idComponent,discCapacity,ssd) VALUES (:idComponent,:discCapacity,:ssd)";


foreach ($hardDiscs as $hardDisc) {
    $db->beginTransaction();
    $statement = $db->prepare($sqlParent);
    $statement->bindValue(":name", $hardDisc->getName(), PDO::PARAM_STR);
    $statement->bindValue(":brand", $hardDisc->getBrand(), PDO::PARAM_STR);
    $statement->bindValue(":description", $hardDisc->getDescription(), PDO::PARAM_STR);
    $statement->bindValue(":price", $hardDisc->getPrice());
    $statement->bindValue(":componentType", $hardDisc->getComponentType(), PDO::PARAM_STR);
    $statement->bindValue(":category", $hardDisc->GetCategory(), PDO::PARAM_STR);
    $statement->execute();
    // insertion des propriétés communes dans la table parent

    $id = $db->lastInsertId();
    // on recupère l'id du composant dans la table parent
    $id = intval($id);
    $statement = $db->prepare($sqlChild);
    $statement->bindValue(":idComponent", $id); //on utilise id du parent comme identifiant dans la table enfant
    $statement->bindValue(":discCapacity", $hardDisc->getDiscCapacity(), PDO::PARAM_STR);
    $statement->bindValue(":ssd", $hardDisc->getSsd(), PDO::PARAM_BOOL);
    $statement->execute();
    // insertion des propriétés spécifique dans la table enfant
    $db->commit();
}