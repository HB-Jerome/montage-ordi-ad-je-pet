<?php

// on inclut la class processor pour créer les objects
use Model\PowerSupply;

$description1 = "noir, MSI MAG Forge 100M, msi B550m-A, fournit pour i5 non-k/KT, crucial BX500 500 GO";
$description2 = "PC de bureau AMD Ryzen 5 7600X propose 6 coeurs natifs et 12 coeurs, AMD AM5.";
$description3 = " AMD Ryzen 7 5700X 8x 4.6GHz Mémoire vive : 16GB DDR4-RAM PC-3200 (2x 8GB) Carte graphique : AMD Radeon RX 6650 XT 8GB M.2 SSD";

// on crée un tableau d'objet basé sur la class Processor

$powersupplys = [
    (new PowerSupply())
        // propriétés communes
        ->setName("Alimentation PC RS PRO, 850W, 5 → 12V c.c.")
        ->setBrand("MSI")
        ->setDescription($description1)
        ->setPrice(140)
        ->setComponentType("fixe")
        ->setIsArchived(false)
        // propriétés spécifiques
        ->setBatteryPower(220),

    (new PowerSupply())
        // propriétés communes
        ->setName("MSI MPG A750GF 750W 80+ Gold")
        ->setBrand("MSI")
        ->setDescription($description2)
        ->setPrice(211)
        ->setComponentType("laptop")
        ->setIsArchived(false)
        // propriétés spécifiques
        ->setBatteryPower(220),

    (new PowerSupply())
        // propriétés communes
        ->setName("ASUS ROG Strix 750W Gold Bloc alimentation")
        ->setBrand("MSI")
        ->setDescription($description3)
        ->setPrice(92)
        ->setComponentType("fixe")
        ->setIsArchived(false)
        // propriétés spécifiques
        ->setBatteryPower(240),
];
// parent sql preparation
$sqlPowerSupplyParent = "INSERT INTO Component (name,brand,description,price,componentType,isArchived,category,quantity) VALUES (:name,:brand,:description,:price,:componentType,false,:category,5)";
// child sql preparation
$sqlPowerSupplyChild = "INSERT INTO powersupply (idComponent, batteryPower) VALUES (:idComponent, :batteryPower)";

$statement = $db->prepare($sqlPowerSupplyParent);
$statementChild = $db->prepare($sqlPowerSupplyChild);

foreach ($powersupplys as $powersupply) {
    //  propriétés communes
    $statement->bindValue(':name', $powersupply->getName(), PDO::PARAM_STR);
    $statement->bindValue(':brand', $powersupply->getBrand(), PDO::PARAM_STR);
    $statement->bindValue(':description', $powersupply->getDescription(), PDO::PARAM_STR);
    $statement->bindValue(':price', $powersupply->getPrice());
    $statement->bindValue(':componentType', $powersupply->getComponentType(), PDO::PARAM_STR);
    $statement->bindValue(':category', $powersupply->GetCategory(), PDO::PARAM_STR);
    // execution de réquete
    $statement->execute();

    $id = $db->lastInsertId();
    // insert child propriétes
    $statementChild->bindValue(':idComponent', $id, PDO::PARAM_INT);
    $statementChild->bindValue(':batteryPower', $powersupply->getBatteryPower(), PDO::PARAM_STR);
    // execution de réquete
    $statementChild->execute();

}
?>