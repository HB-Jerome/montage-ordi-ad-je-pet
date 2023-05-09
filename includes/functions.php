<?php

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
        <option <?php if ($curentComponentId == $option->getidComponent()) {
            echo "selected";
        } ?> value=<?= $option->getidComponent() ?>> <?= $option->getName() ?></option>
        <?php
    }
}


?>