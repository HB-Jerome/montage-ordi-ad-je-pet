<?php

if ($modelHandler->isSubmitted()) {
    if (empty($modelHandler->getErrors())) {
        ?>
        <div class="alert alert-success" role="alert">
            This is a success !
        </div>
        <?php
    } else {

        foreach ($modelHandler->getErrors() as $error) {
            ?>
            <div class="alert alert-danger" role="alert">
                <?= $error ?>
            </div>
            <?php
        }

    }
}



?>

<main class="container">
    <div class=" mx-auto w-75">
        <h1 class="d-flex">Création d'un modèle</h1>

        <h2>liste des composants :</h2>
    </div>

    <div class="row">
        <form method="POST" class="mx-auto w-75">
            <?php include 'src/View/template/formulaireModel.php' ?>
            <div class="py-5 text-center">
                <button class="btn btn-primary" type="submit">Create model</button>
            </div>
        </form>
    </div>
</main>