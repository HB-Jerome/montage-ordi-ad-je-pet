<?php

// on inclut la class MouseAndPad pour créer les objects
use Model\MouseAndPad;

$des1 = "L'INOVU FM 1200 est une souris PC filaire simple, robuste et efficace. Avec son capteur optique 1200 dpi et sa forme pensée pour une prise en main agréable, elle est précise et facile à utiliser. Elle est idéale pour la bureautique et conçue pour durer.";
$des2 = "L'INOVU WM 1600 est une souris PC sans fil simple, robuste et efficace. Avec son capteur optique 1600 dpi et sa forme pensée pour une prise en main agréable, elle est précise et facile à utiliser. Elle est idéale pour la bureautique et conçue pour durer.";
$des3 = "La souris verticale USB évite les torsions de l'avant-bras pour un meilleur confort et une bonne santé. Elle permet d'adopter une posture neutre verticale qui évite généralement à l'avant- bras de se tordre.";



// on crée un tableau d'objet basé sur la class MouseAndPad

$mouseAndPads = [
    (new MouseAndPad())

        // propriétés communes à tous les composants
        ->setName("INOVU FM 1200")
        ->setBrand("INOVU")
        ->setDescription($des1)
        ->setPrice(7)
        ->setComponentType("fixe")
        ->setIsArchived(false)

        // propriétés spécifiques à MouseAndPad
        ->setMouseIsWireless(false)
        ->setNumberOfKey(3),

    (new MouseAndPad())
        // propriétés communes à tous les composants
        ->setName("INOVU WM 1600")
        ->setBrand("INOVU")
        ->setDescription($des1)
        ->setPrice(9)
        ->setComponentType("laptop")
        ->setIsArchived(false)

        // propriétés spécifiques à MouseAndPad
        ->setMouseIsWireless(true)
        ->setNumberOfKey(3),

    (new MouseAndPad())
        // propriétés communes à tous les composants
        ->setName("Souris ergonomique verticale USB (blanche)")
        ->setBrand("Générique")
        ->setDescription($des3)
        ->setPrice(29)
        ->setComponentType("fixe")
        ->setIsArchived(false)

        // propriétés spécifiques à MouseAndPad
        ->setMouseIsWireless(true)
        ->setNumberOfKey(5),
];

// on prépare l'insertion des propriétés communnes dans la table parent
$sqlParent = "INSERT INTO Component (name,brand,description,price,componentType,isArchived,category,quantity) VALUES (:name,:brand,:description,:price,:componentType,false,:category,5)";
// on prepare l'insertion des propriétés spécifiques dans la table enfant
$sqlChild = "INSERT INTO MouseAndPad (idComponent,mouseIsWireless,numberOfKey) VALUES (:idComponent,:mouseIsWireless,:numberOfKey)";


foreach ($mouseAndPads as $hardDisc) {
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
    $statement->bindValue(":mouseIsWireless", $hardDisc->getMouseIsWireless(), PDO::PARAM_BOOL);
    $statement->bindValue(":numberOfKey", $hardDisc->getNumberOfKey(), PDO::PARAM_INT);
    $statement->execute();
    // insertion des propriétés spécifique dans la table enfant
    $db->commit();
}