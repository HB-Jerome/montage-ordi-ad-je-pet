<main>
    <h1 class="text-center">Liste des modeles</h1>

    <div class="row my-5 gap-5">
        <?php foreach ($models as $model) {
            ?>


            <div class="card " style="width: 25rem;">
                <div class="card-body mx-auto">
                    <h5 class="card-title">
                        <?= $model->getName() ?>
                    </h5>
                    <p class="card-text">
                    </p>
                </div>
                <ul class="list-group list-group-flush  mx-auto">
                    <li class="list-group-item">quantity:
                        <?= $model->getQuantity() ?>
                    </li>
                    <li class="list-group-item">price:
                        <?= $model->getPrice() ?> €
                    </li>
                    <li class="list-group-item">isArchived:
                        <?php if ($model->getIsArchived()) {
                            echo "true";
                        } else {
                            echo "false";
                        } ?>
                    </li>
                    <li class="list-group-item">date d'ajout:
                        <?= $model->getAddDate() ?>
                    </li>
                </ul>
                <div class="card-body  mx-auto">
                    <a href="?modificationModel&idModel=<?= $model->getIdModel() ?>" class="card-link">modifier</a>
                    <a href="?detailModel&idModel=<?= $model->getIdModel() ?>" class="card-link">details</a>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</main>