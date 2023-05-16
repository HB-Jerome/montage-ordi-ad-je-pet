<?php

use Service\ComponentFactory;

function displayOptions(?array $components, $category, $curentComponentId)
{
    ?>
    <option value=> </option>
    <?php
    $options = array_filter($components, function ($component) use ($category) {
        return $component->GetCategory() == $category;
    });
    foreach ($options as $option) {
        ?>
        <option <?php if ($curentComponentId == $option->getIdComponent()) {
            ?> selected class="chosen" <?php
        } ?>
            value=<?= $option->getIdComponent() ?>> <?= $option->getName() ?> - <?= $option->getComponentType() ?></option>
        <?php
    }
}

function displayType(array $types, $curentType)
{
    ?>
    <option value=> </option>
    <?php
    foreach ($types as $type) {
        ?>
        <option <?php if ($type == $curentType) {
            echo "selected";
        } ?> value=<?= $type ?>> <?= $type ?></option>
        <?php
    }
}
function getAllComponents($db, $getArchived = true)
{
    $slqComponents = "SELECT *,c.idComponent FROM Component as c
            LEFT JOIN GraphicCard as g on c.idComponent =g.idComponent
            LEFT JOIN HardDisc as h on c.idComponent =h.idComponent
            LEFT JOIN Keyboard as k on c.idComponent =k.idComponent
            LEFT JOIN MotherBoard as mb on c.idComponent =mb.idComponent
            LEFT JOIN MouseAndPad as mp on c.idComponent =mp.idComponent
            LEFT JOIN PowerSupply as ps on c.idComponent =ps.idComponent
            LEFT JOIN Processor as p on c.idComponent =p.idComponent
            LEFT JOIN Ram as r on c.idComponent =r.idComponent
            LEFT JOIN Screen as s on c.idComponent = s.idComponent 
            WHERE isArchived=false OR isArchived=:getArchived";

    $statement = $db->prepare($slqComponents);
    $statement->bindValue(":getArchived", $getArchived, PDO::PARAM_BOOL);
    $statement->execute();
    $components = [];
    while ($result = $statement->fetch()) {
        $components[] = (new ComponentFactory)->create($result);
    }
    return $components;
}
function getComponentById($id, $db)
{
    $slqComponent = "SELECT *,c.idComponent FROM Component as c
            LEFT JOIN GraphicCard as g on c.idComponent =g.idComponent
            LEFT JOIN HardDisc as h on c.idComponent =h.idComponent
            LEFT JOIN Keyboard as k on c.idComponent =k.idComponent
            LEFT JOIN MotherBoard as mb on c.idComponent =mb.idComponent
            LEFT JOIN MouseAndPad as mp on c.idComponent =mp.idComponent
            LEFT JOIN PowerSupply as ps on c.idComponent =ps.idComponent
            LEFT JOIN Processor as p on c.idComponent =p.idComponent
            LEFT JOIN Ram as r on c.idComponent =r.idComponent
            LEFT JOIN Screen as s on c.idComponent = s.idComponent
            WHERE c.idComponent = :id";
    $statement = $db->prepare($slqComponent);
    $statement->bindValue(":id", $id, PDO::PARAM_INT);
    $statement->execute();
    $result = $statement->fetch();

    $component = (new ComponentFactory)->create($result);
    return $component;
}
?>