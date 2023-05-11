<h1>Détails d'un composant</h1>

<?php
if (!$componentIsValid) {
    ?> <div class="alert alert-danger" role="alert">
    Cette page n'existe pas
  </div> <?php
}else {



?>

<div class="card mb-3">
    <img class="card-img-top" src="..." alt="Card image cap">
    <div class="card-body">
        <!-- Propriétés de la classe mère -->
        <h5 class="card-title">
            <?= $details->getName() ?>
        </h5>
        <p class="card-text"> Marque :
            <?= $details->getBrand() ?>
        </p>
        <p class="card-text"> Description :
            <?= $details->getDescription() ?>
        </p>
        <p class="card-text"> Catégorie :
            <?= $details->getCategory() ?>
        </p>
        <p class="card-text"> Quantité disponible :
            <?= $details->getQuantity() ?>
        </p>
        <p class="card-text"> Prix :
            <?= $details->getPrice() ?>
        </p>
        <p class="card-text"> Type de pc :
            <?= $details->getPcType() ?>
        </p>
        <!-- Propriétés de la classe fille -->
        <?php if (false) {
            ?>
            <p class="card-text"> Marque :
                <?= $details['brand'] ?>
            </p>
        <?php

        } elseif ($details->getCategory() == 'MouseAndPad') {
            ?>
            <p class="card-text"> Connectique :
                <?php if ($details->getIsWireless() == 0) {
                    echo 'Filaire';
                } else {
                    echo 'Sans fil';
                } ?>
            </p>
            <?php
            ?>
            <p class="card-text"> Nombre de touches :
                <?= $details->getKeyType() ?>
            </p>
        <?php
        } elseif ($details->getCategory() == 'Keyboard') {
            ?>
            <p class="card-text"> Connectique :
                <?php if ($details->getIsWireless() == 0) {
                    echo 'Filaire';
                } else {
                    echo 'Sans fil';
                } ?>
            </p>
            <?php
            ?>
            <p class="card-text"> Pavé numérique :
                <?php if ($details->getWithPad() == 0) {
                    echo 'Sans pad';
                } else {
                    echo 'Avec Pad';
                } ?>
            </p>
            <?php
            ?>
            <p class="card-text"> Type de touches :
                <?= $details->getkeyType() ?>
            </p>
            <?php
        } elseif ($details->getCategory() == 'HardDisc') {
            ?>
            <p class="card-text"> Capacité :
                <?= $details->getCapacity() ?>
            </p>
            <?php
            ?>
            <p class="card-text"> Type :
                <?php if ($details->getSsd() == 0) {
                    echo 'Disque dur';
                } else {
                    echo 'SSD';
                } ?>
            </p>
        <?php
        } elseif ($details->getCategory() == 'GraphicCard') {
            ?>
            <p class="card-text"> Chipset :
                <?= $details->getChipset() ?>
            </p>
            <?php
            ?>
            <p class="card-text"> Mémoire :
                <?= $details->getMemory() ?>
            </p>
        <?php
        } elseif ($details->getCategory() == 'Motherboard') {
            ?>
            <p class="card-text"> Socket :
                <?= $details->getSocket() ?>
            </p>
            <?php
            ?>
            <p class="card-text"> Format :
                <?= $details->getFormat() ?>
            </p>
        <?php
        } elseif ($details->getCategory() == 'Screen') {
            ?>
            <p class="card-text"> Taille de la diagonale :
                <?= $details->getSize() ?>
            </p>
            <?php
        } elseif ($details->getCategory() == 'PowerSupply') {
            ?>
            <p class="card-text"> Alimentation :
                <?= $details->getBatteryPower() ?>
            </p>
            <?php
        } elseif ($details->getCategory() == 'Ram') {
            ?>
            <p class="card-text"> Capacité :
                <?= $details->getCapacity() ?>
            </p>
            <?php
            ?>
            <p class="card-text"> Nombre de barres :
                <?= $details->getNumberOfBars() ?>
            </p>
            <?php
            ?>
            <p class="card-text"> Description :
                <?= $details->getDescription() ?>
            </p>
        <?php
        } elseif ($details->getCategory() == 'Processor') {
            ?>
            <p class="card-text"> Fréquence CPU :
                <?= $details->getCpuFrequency() ?>
            </p>
            <?php
            ?>
            <p class="card-text"> Nombre de cœurs :
                <?= $details->getCoreNumber() ?>
            </p>
            <?php
            ?>
            <p class="card-text"> Chipsets compatibles :
                <?= $details->getCompatibleChipset() ?>
            </p>
        <?php
        }

        ?>

    </div>
</div>
 <?php } ?> 