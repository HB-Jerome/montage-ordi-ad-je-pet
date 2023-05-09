<?php

function displayOptions(?array $components, $category)
{
    ?>
    <option value=> </option>
    <?php

    $options = array_filter($components, function ($component) use ($category) {
        return $component->GetCategory() == $category;
    });
    foreach ($options as $option) {
        ?>
        <option value=<?= $option->getidComponent() ?>> <?= $option->getName() ?></option>
        <?php
    }
}


?>