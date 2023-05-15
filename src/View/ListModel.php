<main>
    <h1 class="text-center">Liste des modeles</h1>

    <div class="row my-5 gap-5">
        <?php foreach ($models as $model) {
            ?>
            <div class="card px-5" style="width: 25rem;">
                <div class="card-body">
                    <h5 class="card-title text-center py-3">
                        <?= $model->getName() ?>
                    </h5>
                    <p>Decription: </p>
                    <p class="card-text">
                        <?= $model->getDescriptionModel() ?>
                    </p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">type:
                        <?= $model->getModelType() ?>
                    </li>
                    <li class="list-group-item">quantity:
                        <?= $model->getModelQuantity() ?>
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
                <div class="card-body mx-auto">
                    <a href="?page=updateModel&idModel=<?= $model->getIdModel() ?>" class="card-link">modifier</a>
                    <a href="?page=detailModel&idModel=<?= $model->getIdModel() ?>" class="card-link">details</a>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</main>