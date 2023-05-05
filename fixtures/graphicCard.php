<?php
spl_autoload_register(function ($class) {
    require_once "../src/$class.php";
});
include "../includes/config.inc.php";
// on inclut la class GraphicCard pour créer les objects
use Model\GraphicCard;

$des1 = "La carte graphique MSI GeForce RTX 3060 VENTUS 2X 12G OC LHR embarque 12 Go de mémoire vidéo de nouvelle génération GDDR6. Ce modèle bénéficie de fréquences de fonctionnement élevées.";
$des2 = "La carte graphique NVIDIA GeForce RTX 4080 offre une rapidité extrême pour les joueurs comme pour les créateurs. Avec des performances hors norme et des capacités graphiques améliorées par Intelligence Artificielle.";
$des3 = "Grâce au DLSS 3, au ray tracing à haute vitesse et aux performances accélérées par IA, la carte graphique Gainward GeForce RTX 4070 Ghost vous permet d'obtenir une qualité graphique exceptionnelle.";



// on crée un tableau d'objet basé sur la class GraphicCard

$graphicCards = [
    (new GraphicCard())

        // propriètés communes a tous les composants
        ->setName("MSI GeForce RTX 3060 VENTUS 2X 12G OC LHR")
        ->setBrand("MSI")
        ->setDescription($des1)
        ->setPrice(399)
        ->setPcType("fixe")
        ->setIsArchived(false)
        // proprièté spécifique a GraphicCard
        ->setChipset("NVIDIA GeForce RTX 3060")
        ->setMemory("12Go"),

    (new GraphicCard())
        // propriétes communes a tous les composants
        ->setName("Gigabyte GeForce RTX 4080 GAMING OC 16G")
        ->setBrand("Gigabyte")
        ->setDescription($des2)
        ->setPrice(1249)
        ->setPcType("fixe")
        ->setIsArchived(false)
        // proprièté spécifique a GraphicCard
        ->setChipset("NVIDIA GeForce RTX 4080")
        ->setMemory("16Go "),
    (new GraphicCard())
        // propriétes communes a tous les composants
        ->setName("Gainward GeForce RTX 4070 Ghost")
        ->setBrand("Gainward")
        ->setDescription($des3)
        ->setPrice(649)
        ->setPcType("fixe")
        ->setIsArchived(false)
        // proprièté spécifique a GraphicCard
        ->setChipset("NVIDIA GeForce RTX 4070")
        ->setMemory("12Go"),
];

// on prepare l'insertion des propriétes communne dans la table parent
$sqlParent = "INSERT INTO Component (name,brand,description,price,pcType,isArchived,category) VALUES (:name,:brand,:description,:price,:pcType,false,:category)";
// on prepare l'insertion des propriétes spécifique dans la table enfant
$sqlChild = "INSERT INTO GraphicCard (idComponent,chipset,memory) VALUES (:idComponent,:chipset,:memory)";

$statementParent = $db->prepare($sqlParent);
$statementChild = $db->prepare($sqlChild);
foreach ($graphicCards as $graphicCard) {
    $db->beginTransaction();

    $statementParent->bindValue(":name", $graphicCard->getName(), PDO::PARAM_STR);
    $statementParent->bindValue(":brand", $graphicCard->getBrand(), PDO::PARAM_STR);
    $statementParent->bindValue(":description", $graphicCard->getDescription(), PDO::PARAM_STR);
    $statementParent->bindValue(":price", $graphicCard->getPrice());
    $statementParent->bindValue(":pcType", $graphicCard->getPrice(), PDO::PARAM_STR);
    $statementParent->bindValue(":category", $graphicCard->GetCategory(), PDO::PARAM_STR);
    $statementParent->execute();
    // insertion des propriétes communne dans la table parent

    $id = $db->lastInsertId();
    // on recupert l'id du composant dans la table parent
    $id = intval($id);

    $statementChild->bindValue(":idComponent", $id); //on utilise id du parent comme identifiant dans la table enfant
    $statementChild->bindValue(":chipset", $graphicCard->getChipset(), PDO::PARAM_STR);
    $statementChild->bindValue(":memory", $graphicCard->getMemory(), PDO::PARAM_STR);
    $statementChild->execute();
    // insertion des propriétes spécifique dans la table enfant
    $db->commit();
}