<section class="container">
    <h2 class="text-center mt-5 mb-5">Détails d'un modèlé</h2>
    <div id="ModelDetail" class="container d-flex ">

        <ul class="list-unstyled col-3 border border-secondary ps-3">
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

        <ul class="list-unstyled col-4 border border-secondary ps-3">
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
                            <?= "SSD" ?>
                        <?php } else { ?>
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

        <div class="col-4 border border-secondary commentContainer">
            <h3 class="text-center p-3">CHATBOX</h3>
            <ul class="list-unstyled">
                <?php foreach ($dataComments as $dataComment) {
                    if ($dataComment['user']->getRole() == "concepteur") { ?>
                        <li class="d-flex justify-content-start mb-4 100">
                            <!-- <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-6.webp" alt="avatar"
                                class="rounded-circle d-flex align-self-start me-3 shadow-1-strong" width="60"> -->
                            <div class="card w-75">
                                <div class="card-header d-flex justify-content-between p-3">
                                    <p class="fw-bold mb-0">
                                        <?= $dataComment['user']->getUsername() ?>
                                    </p>
                                    <p class="text-muted small mb-0"><i class="far fa-clock"></i>
                                        <?= $dataComment['comment']->getCommentDate() ?>
                                    </p>
                                </div>
                                <div class="card-body">
                                    <p class="mb-0">
                                        <?= $dataComment['comment']->getMessage() ?>
                                    </p>
                                </div>
                            </div>
                        </li>

                        <?php
                    } elseif ($dataComment['user']->getRole() == "monteur") {
                        ?>
                        <li class="d-flex justify-content-end mb-4 ">
                            <div class="card w-75">
                                <div class="card-header d-flex justify-content-between p-3 bg-primary text-white">
                                    <p class="fw-bold mb-0">
                                        <?= $dataComment['user']->getUsername() ?>
                                    </p>
                                    <p class="text-white small mb-0 text-white"><i class="far fa-clock"></i>
                                        <?= $dataComment['comment']->getCommentDate() ?>
                                    </p>
                                </div>
                                <div class="card-body">
                                    <p class="mb-0">
                                        <?= $dataComment['comment']->getMessage() ?>
                                    </p>
                                </div>
                            </div>
                            <!-- <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-5.webp" alt="avatar"
                                class="rounded-circle d-flex align-self-start ms-3 shadow-1-strong" width="60"> -->
                        </li>
                        <?php
                    }


                } ?>
            </ul>

        </div>
    </div>
    <div class="row">
        <form class="border border-secondary col-md-8 offset-md-2" method="post">
            <h3 class="text-center mt-3 ">Ajouter un commentaire</h2>
                <div class="">
                    <label for="floatingTextarea">Comments</label>
                    <textarea class="form-control" name="message" rows="3" placeholder="Leave a comment here"
                        id="floatingTextarea"></textarea>

                </div>
                <div class="text-center m-3">
                    <button type="submit" class="btn btn btn-success">Envoyer</button>
                </div>
        </form>
    </div>


</section>