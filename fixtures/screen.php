<?php

// on inclut la class processor pour créer les objects
use model\Screen;

$description1 = "G-MASTER Red Eagle GB3461WQSU-B1 Ecran LED 34 pouces UltraWide Quad HD 3440 x 1440 pixels de marque Iiyama référence GB3461WQSU-B1 ainsi que les conditions de livraison pour ce produit et les avis de clients ";
$description2 = "G-MASTER Red Eagle GB3461WQSU-B1 Ecran LED 34 pouces UltraWide Quad HD 3440 x 1440 pixels de marque Iiyama référence GB3461WQSU-B1 ainsi que les conditions de livraison pour ce produit et les avis de clients ";
$description3 = "G-MASTER Red Eagle GB3461WQSU-B1 Ecran LED 34 pouces UltraWide Quad HD 3440 x 1440 pixels de marque Iiyama référence GB3461WQSU-B1 ainsi que les conditions de livraison pour ce produit et les avis de clients ";

// on crée un tableau d'objet basé sur la class Processor

$screens = [
    (new Screen())
        // propriétés communes
        ->setName("Écran HP M27f - 27 FHD - AMD FreeSync")
        ->setBrand("LED")
        ->setDescription($description1)
        ->setPrice(154.20)
        ->setPcType("fixe")
        ->setIsArchived(false)
        // propriétés spécifiques
        ->setSize(38),

    (new Screen())
        // propriétés communes
        ->setName("Gigabyte G34WQC - Écran LED - incurvé - 34 - 3440 x 1440 QHD")
        ->setBrand("LED")
        ->setDescription($description2)
        ->setPrice(514.20)
        ->setPcType("fixe")
        ->setIsArchived(false)
        // propriétés spécifiques
        ->setSize(49),

    (new Screen())
        // propriétés communes
        ->setName("Ecran PC Gamer Incurvé - VIEWSONIC VX3218 - PC - MHD - 32")
        ->setBrand("LED")
        ->setDescription($description3)
        ->setPrice(300.20)
        ->setPcType("fixe")
        ->setIsArchived(false)
        // propriétés spécifiques
        ->setSize(42),
];

// parent sql preparation
$sqlScreenParent = "INSERT INTO Component (name,brand,description,price,pcType,isArchived) VALUES (:name,:brand,:description,:price,:pcType,false)";
// child processor sql preparation
$sqlScreenChild = "INSERT INTO screen (idComponent, size) VALUES (:idComponent, :size)";

$statement = $db->prepare($sqlScreenParent);
$statementChild = $db->prepare($sqlScreenChild);

foreach ($screens as $screen) {
    //  propriétés communes
    $statement->bindValue(":name", $screen->getName());
    $statement->bindValue(":brand", $screen->getBrand());
    $statement->bindValue(":description", $screen->getDescription());
    $statement->bindValue(":price", $screen->getPrice());
    $statement->bindValue(":pcType", $screen->getPrice());
    $statement->execute();
    // execution de réquete
    $statement->execute();

    $id = $db->lastInsertId();
    // insert child propriétes
    $statementChild->bindValue(':idComponent', $id);
    $statementChild->bindValue(':size', $screen->getSize());
    $statementChild->execute();
}
?>