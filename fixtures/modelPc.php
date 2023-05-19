<?php

// on inclut la class MotherBoard pour créer les objects
use Model\ModelPc;
use Model\Component;

$des1 = "Vous voici devant le PC Gamer Cybertek Titan, un PC gamer qui accueille un processeur Intel i9 13900KF ultra performant ! Profitez également de la toute dernière génération de carte graphique Nvidia avec la carte graphique RTX 4090 pour une puissance monstrueuse !";
$des2 = "Découvrez le PC Gamer Cybertek Frozen et sa configuration impressionnante. Vous trouverez notamment un processeur Intel i7 13700K accompagné d'une mémoire vive d'une capacité de 32 Go DDR5 RGB. Le PC Gamer Cybertek Frozen dispose également d'une très puissante carte graphique RTX 4080 pour des games au sommet !";
$des3 = "Le PC gamer CYBERTEK EL DIABLO offre une expérience de jeu exceptionnelle avec un processeur i5 13600KF, une carte graphique RTX 4070Ti, une mémoire RAM 32 Go DDR4, un disque 1 To SSD NVMe et une alimentation 850W Gold. Son boîtier PC Hyte Y-60 Rouge et ses ventilateurs ARGB ajoutent une touche esthétique à votre espace de jeu.";



// on crée un tableau d'objet basé sur la class MotherBoard

$modelPcs = [
    (new ModelPc())

        // propriétés communes à tous les composants
        ->setName("Model pc 1")
        ->setDescriptionModel($des1)
        ->setmodelType(Component::FIXE)
        ->setIsArchived(false),

    (new ModelPc())
        // propriétés communes à tous les composants
        ->setName("Model pc n°2")
        ->setDescriptionModel($des2)
        ->setmodelType(Component::FIXE)
        ->setIsArchived(false),

    (new ModelPc())
        // propriétés communes à tous les composants
        ->setName("Model pc n°3")
        ->setDescriptionModel($des3)
        ->setmodelType(Component::LAPTOP)
        ->setIsArchived(false),
];

$categories = Component::AVAILABLE_CATEGORIES;

$laptop = 0;
$fixe = 0;
foreach ($modelPcs as $modelPc) {

    $sqlModel = "INSERT INTO modelPc (name,descriptionModel,modelType,modelQuantity,nbrPcCreated,isArchived) VALUE (:name,:descriptionModel,:modelType,0,0,false)";
    $statementModel = $db->prepare($sqlModel);
    $statementModel->bindValue(":name", $modelPc->getName());
    $statementModel->bindValue(":descriptionModel", $modelPc->getDescriptionModel());
    $statementModel->bindValue(":modelType", $modelPc->getModelType());
    $statementModel->execute();

    $idModel = $db->lastInsertId();
    var_dump("idModel " . $idModel);

    if ($modelPc->getModelType() == Component::FIXE) {
        $offset = $fixe;
    } else {
        $offset = $laptop;
    }
    var_dump("offset " . $offset);
    foreach ($categories as $category) {
        $sqlComponent = "SELECT idComponent FROM Component WHERE category=:category AND componentType=:componentType LIMIT 1 OFFSET :offset";
        $statement = $db->prepare($sqlComponent);
        $statement->bindValue(':category', $category, PDO::PARAM_STR);
        $statement->bindValue(':componentType', $modelPc->getModelType(), PDO::PARAM_STR);
        $statement->bindValue(':offset', $offset, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetch();
        $idComponent = $result['idComponent'];

        var_dump($idComponent);
        // $config[] = ["id" => $id, "quantity" => 1];

        $sqlModelPc_Component = "INSERT INTO ModelPc_Component (idComponent, idModel,quantity) VALUES (:idComponent, :idModel,1)";

        $Modelpc_Component = $db->prepare($sqlModelPc_Component);
        $Modelpc_Component->bindValue(":idComponent", $idComponent, PDO::PARAM_INT);
        $Modelpc_Component->bindValue(":idModel", $idModel, PDO::PARAM_INT);
        $Modelpc_Component->execute();


    }
    if ($modelPc->getModelType() == Component::FIXE) {
        $fixe++;
    } else {
        $laptop++;
    }
}