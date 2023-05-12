<?php

// on inclut la class processor pour créer les objects
use Model\Processor;

$description1 = "noir, MSI MAG Forge 100M, msi B550m-A, fournit pour i5 non-k/KT, crucial BX500 500 GO";
$description2 = "PC de bureau AMD Ryzen 5 7600X propose 6 coeurs natifs et 12 coeurs, AMD AM5.";
$description3 = " AMD Ryzen 7 5700X 8x 4.6GHz Mémoire vive : 16GB DDR4-RAM PC-3200 (2x 8GB) Carte graphique : AMD Radeon RX 6650 XT 8GB M.2 SSD";

// on crée un tableau d'objet basé sur la class Processor

$processors = [
    (new Processor())
        // propriétés communes
        ->setName("PC Gamer RTX 3070 Aeroman")
        ->setBrand("AMD")
        ->setDescription($description1)
        ->setPrice(942)
        ->setComponentType("fixe")
        ->setIsArchived(false)
        // propriétés spécifiques
        ->setCoreNumber(9)
        ->setCompatibleChipset("core i5-12400F")
        ->setCpuFrequency(3.6),

    (new Processor())
        // propriétés communes
        ->setName("AMD Ryzen 5 7600X (4.7 GHz / 5.3 GHz)")
        ->setBrand("AMD")
        ->setDescription($description2)
        ->setPrice(312)
        ->setComponentType("fixe")
        ->setIsArchived(false)
        // propriétés spécifiques
        ->setCoreNumber(6)
        ->setCompatibleChipset("core i5-12400F")
        ->setCpuFrequency(2.2),

    (new Processor())
        // propriétés communes
        ->setName("PC Gamer AMD Ryzen 7 5700X - 4.6 Ghz - Ram 16 Go - SSD 500 Go ")
        ->setBrand("AMD")
        ->setDescription($description3)
        ->setPrice(650)
        ->setComponentType("fixe")
        ->setIsArchived(false)
        // propriétés spécifiques
        ->setCoreNumber(8)
        ->setCompatibleChipset("core i5-12400F")
        ->setCpuFrequency(4.5),
];
// parent sql preparation
$sqlProcessorParent = "INSERT INTO Component (name,brand,description,price,componentType,isArchived,category,quantity) VALUES (:name,:brand,:description,:price,:componentType,false,:category,5)";
// child processor sql preparation
$sqlProcessorChild = "INSERT INTO  processor (idComponent, coreNumber, compatibleChipset, cpuFrequency) VALUES (:idComponent, :coreNumber, :compatibleChipset, :cpuFrequency) ";

$statement = $db->prepare($sqlProcessorParent);
$statementChild = $db->prepare($sqlProcessorChild);

foreach ($processors as $processor) {
    //  propriétés communes
    $statement->bindValue('name', $processor->getName(), PDO::PARAM_STR);
    $statement->bindValue('brand', $processor->getBrand(), PDO::PARAM_STR);
    $statement->bindValue('description', $processor->getDescription(), PDO::PARAM_STR);
    $statement->bindValue('price', $processor->getPrice());
    $statement->bindValue('componentType', $processor->getComponentType(), PDO::PARAM_STR);
    $statement->bindValue('category', $processor->GetCategory(), PDO::PARAM_STR);
    // execution de réquete
    $statement->execute();

    $id = $db->lastInsertId();
    // insert child propriétes
    $statementChild->bindValue(':idComponent', $id, PDO::PARAM_INT);
    $statementChild->bindValue(':coreNumber', $processor->getCoreNumber(), PDO::PARAM_INT);
    $statementChild->bindValue(':compatibleChipset', $processor->getCompatibleChipset(), PDO::PARAM_STR);
    $statementChild->bindValue(':cpuFrequency', $processor->getCpuFrequency());
    // execution de réquete
    $statementChild->execute();
}
?>