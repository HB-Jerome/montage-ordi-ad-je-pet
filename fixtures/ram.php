<?php

use Model\Ram;

$description1 = "La mémoire Kingston FURY Beast DDR5 intègre la toute dernière technologie de pointe aux plateformes de jeu de prochaine génération. Poussant la vitesse, la capacité et la fiabilité";
$description2 = "vec la nouvelle gamme de mémoires PC haut de gamme Vengeance LPX Series, Corsair propose des solutions stables et performantes pour les plateformes nouvelle génération avec en prime un fort potentiel d'overclocking";
$description3 = "La mémoire RAM DDR4 Corsair Vengeance RGB RS renforce l'esthétique de votre PC tout en offrant des performances exceptionnelles. Un PCB personnalisé,signal élevée pour des performances et une stabilité exceptionnelles AMD DDR4.";

$rams = [
    (new Ram())
        // propriétés communes
        ->setName("Kingston FURY Beast 32 Go (2 x 16 Go) DDR5 5600 MHz CL40 ")
        ->setBrand("Kingstone")
        ->setDescription($description1)
        ->setPrice(90.12)
        ->setPcType("fixe")
        ->setIsArchived(false)
        // propriétés spécifiques
        ->setCapacity(32)
        ->setNumberOfBars(2)
        ->setDescription('Kit Dual Channel 2 barrettes de RAM DDR5 PC5-44800'),
    (new Ram())
        // propriétés communes
        ->setName("Corsair Vengeance LPX Series Low Profile 32 Go (2x 16 Go) DDR4 3200 MHz CL16 ")
        ->setBrand("Kingstone")
        ->setDescription($description2)
        ->setPrice(58)
        ->setPcType("fixe")
        ->setIsArchived(false)
        // propriétés spécifiques
        ->setCapacity(32)
        ->setNumberOfBars(2)
        ->setDescription('Corsair Vengeance RGB RS 16 Go (2 x 8 Go) DDR4 3200 MHz CL16 '),

    (new Ram())
        // propriétés communes
        ->setName("Kingston FURY Beast 32 Go (2 x 16 Go) DDR5 5600 MHz CL40 ")
        ->setBrand("Kingstone")
        ->setDescription($description3)
        ->setPrice(62.23)
        ->setPcType("fixe")
        ->setIsArchived(false)
        // propriétés spécifiques
        ->setCapacity(42)
        ->setNumberOfBars(3)
        ->setDescription('Kit Dual Channel 2 barrett PC5-44800'),
];
// parent sql prépare
$sqlRamParent = "INSERT INTO Component (name,brand,description,price,pcType,isArchived) VALUES (:name, :brand, :description, :price, :pcType,:isArchived)";

// child sql prépare
$sqlRamChild = "INSERT INTO ram (idComponent, capacity, numberOfBars, description) VALUES (:idComponent, :capacity, :numberOfBars, :description)";

$statement = $db->prepare($sqlRamParent);
$statementChild = $db->prepare($sqlRamChild);

foreach ($rams as $ram) {
    //  propriétés communes
    $statement->bindValue(':name', $ram->getName(), PDO::PARAM_STR);
    $statement->bindValue(':brand', $ram->getBrand(), PDO::PARAM_STR);
    $statement->bindValue(':description', $ram->getDescription(), PDO::PARAM_STR);
    $statement->bindValue(':price', $ram->getPrice());
    $statement->bindValue(':pcType', $ram->getPcType(), PDO::PARAM_STR);
    $statement->bindValue(':isArchived', $ram->getIsArchived(), PDO::PARAM_BOOL);
    // execution de réquete
    $statement->execute();

    $id = $db->lastInsertId();
    // insert child propriétes
    $statementChild->bindValue(':idComponent', $id, PDO::PARAM_INT);
    $statementChild->bindValue(':capacity', $ram->getCapacity(), PDO::PARAM_INT);
    $statementChild->bindValue(':numberOfBars', $ram->getNumberOfBars(), PDO::PARAM_STR);
    $statementChild->bindValue(':description', $ram->getDescription());
    // execution de réquete
    $statementChild->execute();

}

?>