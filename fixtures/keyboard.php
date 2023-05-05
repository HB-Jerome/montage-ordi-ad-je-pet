<?php
use Model\Keyboard;

// on inclut la class GraphicCard pour créer les objects

$des1 = "Foncez vers la victoire avec le clavier ROCCAT Vulcan Pro. Ce clavier gaming est équipé de switch Titan Optical qui offrent un tout autre niveau de vitesse et réactivité. De plus, le design fin du clavier vous permet de poser à plat vos mains afin de réduire votre fatigue.";
$des2 = "Conçu notamment pour le jeu, le Logitech G213 Prodigy Gaming Keyboard offre un toucher unique et des performances incomparables grâce à ses touches jusqu'à 4 fois plus rapide que les claviers standard. Totalement anti-ghosting, il vous garantit un contrôle incomparable.";
$des3 = "Designed for designers and built for coders, the Logitech MX Keys is the key to your next big project. Enjoy smooth, natural, precise typing with concave keys that follow the shape of your fingers.";



// on crée un tableau d'objet basé sur la class GraphicCard

$keyboards = [
    (new Keyboard())

        // propriètés communes a tous les composants
        ->setName("ROCCAT Vulcan Pro (Tactile)")
        ->setBrand("ROCCAT")
        ->setDescription($des1)
        ->setPrice(119)
        ->setPcType("fixe")
        ->setIsArchived(false)
        // propriètés specifiques au composant
        ->setIsWireless(true)
        ->setWithPad(true)
        ->setKeyType("Optique"),

    (new Keyboard())
        // propriétes communes a tous les composants
        ->setName("Logitech G G213 Prodigy Gaming Keyboard")
        ->setBrand("Logitech G")
        ->setDescription($des2)
        ->setPrice(54)
        ->setPcType("fixe")
        ->setIsArchived(false)
        // propriètés specifiques au composant
        ->setIsWireless(false)
        ->setWithPad(false)
        ->setKeyType("membrane"),
    (new Keyboard())
        // propriétes communes a tous les composants
        ->setName("Logitech MX Keys (Graphite)")
        ->setBrand("Gainward")
        ->setDescription($des3)
        ->setPrice(119)
        ->setPcType("fixe")
        ->setIsArchived(false)
        // propriètés specifiques au composant
        ->setIsWireless(true)
        ->setWithPad(false)
        ->setKeyType("Chiclet")
];

// on prepare l'insertion des propriétes communne dans la table parent

$sqlParent = "INSERT INTO Component (name,brand,description,price,pcType,isArchived,category) VALUES (:name,:brand,:description,:price,:pcType,false,:category)";
// on prepare l'insertion des propriétes spécifique dans la table enfant
$sqlChild = "INSERT INTO keyboard (idComponent, isWireless, withPad, keyType) VALUES (:idComponent,:isWireless,:withPad,:keyType)";

foreach ($keyboards as $keyboard) {
    $statement = $db->prepare($sqlParent);
    $statement->bindValue(":name", $keyboard->getName(), PDO::PARAM_STR);
    $statement->bindValue(":brand", $keyboard->getBrand(), PDO::PARAM_STR);
    $statement->bindValue(":description", $keyboard->getDescription(), PDO::PARAM_STR);
    $statement->bindValue(":price", $keyboard->getPrice());
    $statement->bindValue(":pcType", $keyboard->getPcType(), PDO::PARAM_STR);
    $statement->bindValue(":category", $keyboard->getPcType(), PDO::PARAM_STR);
    $statement->execute();
    // insertion des propriétes communne dans la table parent

    $id = $db->lastInsertId();
    // on recupert l'id du composant dans la table parent
    $id = intval($id);
    $statementChild = $db->prepare($sqlChild);
    $statementChild->bindValue(":idComponent", $id);
    //on utilise id du parent comme identifiant dans la table enfant
    $statementChild->bindValue(":isWireless", $keyboard->getIsWireless(), PDO::PARAM_BOOL);
    $statementChild->bindValue(":withPad", $keyboard->getWithPad(), PDO::PARAM_BOOL);
    $statementChild->bindValue(":keyType", $keyboard->getKeyType(), PDO::PARAM_STR);
    $statementChild->execute();
    // insertion des propriétes spécifique dans la table enfant
}