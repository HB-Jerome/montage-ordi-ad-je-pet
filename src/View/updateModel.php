<?php

if (!$modelIsValid) {
    ?>
    <div class="alert alert-danger" role="alert">
        Impossible de trouver ce model
    </div>
    <?php
} else {


    if ($modelHandler->isSubmitted()) {

        foreach ($modelHandler->getErrors() as $error) {
            ?>
            <div class="alert alert-danger" role="alert">
                <?= $error ?>
            </div>
            <?php
        }

    } ?>

    <main class="container">
        <div class=" mx-auto w-75">
            <h1 class="d-flex">modification Modele</h1>
        </div>

        <div class="row">
            <?php include 'src/View/template/formulaireModel.php' ?>

            <div class="py-5 text-center">
                <button class="btn btn-primary" type="submit">Update model</button>
            </div>



        </div>
        <div>

        </div>

        <?php
} ?>
</main>