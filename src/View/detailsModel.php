<section>
    <h2 class="text-center mt-5 mb-5">Détails d'un modèlé</h2>
    <div class = "container d-flex">

    <ul class = "list-unstyled col-3 border border-secondary ps-3">
        <li>Nom</li>
        <li>Description</li>
        <li>Type</li>
        <li>Date d'ajout</li>
        <!-- <-- categorychild -->
        <li>Chipset</li>
        <li>Mémoire</li>
        <li>Ssd</li>
        <li>Capacité du disque</li>
        <li>Type de clavier</li>
        <li>Socket de carte mère</li>
        <li>format de carte mère.</li>
        <li>NumberOfKeys</li>
        <li>Alimentation</li>
        <li>Numéro CPU</li>
        <li>CPU compatible</li>
        <li>Fréquence du processeur</li>
        <li>nombre de barrettes de RAM</li>
        <li>RAM</li>
        <li>Taille de l'écran</li>
    </ul>
    
    <ul class = "list-unstyled col-7 border border-secondary ps-3">
        <?php foreach ($modelResults as $modelResult) { ?>
            <li>
                <?= $modelResult->getName(); ?>

            <li>
                <?= $modelResult->getDescriptionModel(); ?>
            </li>
            </li>
            <li>
                <?= $modelResult->getModelType(); ?>
            </li>
            <li>
                <?= $modelResult->getAddDate(); ?>
            </li>
        <?php } ?>
        <!-- categorychild -->
        <?php foreach ($components as $component) { ?>
            <?php if ($component->getCategory() == "GraphicCard") { ?>
                <li>
                    <?= $component->getChipset(); ?>
                </li>
                <li>
                    <?= $component->getMemory(); ?>
                </li>
            <?php } ?>

            <?php if ($component->getCategory() == "HardDisc") { ?>
                <li>
                    <?php if ($component->getSsd() == 0) { ?>
                        <?= "SSD"?>
                        <?php } else  { ?>  
                            <?= "HHD" ?>
                            <?php } ?>
                </li>
                <li>
                    <?= $component->getDiscCapacity(); ?> GO
                </li>
            <?php } ?>

            <?php if ($component->getCategory() == "Keyboard") { ?>
                <li>
                    <?= $component->getKeyType(); ?>
                </li>
            <?php } ?>

            <?php if ($component->getCategory() == "MotherBoard") { ?>
                <li>
                    <?= $component->getSocket(); ?>
                </li>
                <li>
                    <?= $component->getFormat(); ?>
                </li>
            <?php } ?>

            <?php if ($component->getCategory() == "MouseAndPad") { ?>
                <li>
                    <?= $component->getNumberOfKey(); ?>
                </li>
            <?php } ?>

            <?php if ($component->getCategory() == "PowerSupply") { ?>
                <li>
                    <?= $component->getBatteryPower(); ?> Volts
                </li>
            <?php } ?>

            <?php if ($component->getCategory() == "Processor") { ?>
                <li>
                    <?= $component->getCoreNumber(); ?>
                </li>
                <li>
                    <?= $component->getCompatibleChipset(); ?>
                </li>
                <li>
                    <?= $component->getCpuFrequency(); ?> MHz
                </li>
            <?php } ?>

            <?php if ($component->getCategory() == "Ram") { ?>
                <li>
                    <?= $component->getNumberOfBars(); ?> Bars
                </li>
                <li>
                    <?= $component->getRamCapacity(); ?> GO
                </li>
            <?php } ?>

            <?php if ($component->getCategory() == "Screen") { ?>
                <li>
                    <?= $component->getSize(); ?>
                </li>
            <?php } ?>

        <?php } ?>
    </ul>
    <form class = "col-2 border border-secondary" action="" method="post">
        <h2 class="text-center mt-5 mb-5" >Ajouter un commentaire</h2>
        <div class="form-floating">
            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
            <label for="floatingTextarea">Comments</label>
        </div>
        <div class="text-center m-5">
            <button type="submit" class="btn btn btn-success">Envoyer</button>
        </div>
    </form>
    </div>
    
</section>