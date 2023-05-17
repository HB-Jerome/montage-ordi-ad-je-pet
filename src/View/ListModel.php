<main>
    <section>
        <!-- add the filtre of items per category
         -->
        <h1 class="text-center">Liste des modèles</h1>
        <!-- filtre -->
        <div class=" d-md-flex align-item-center gap-3 ">
            <!--  filter -->
            <!-- table liste -->
            <table id="tableList" class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Nom</th>
                        <th scope="col">Date Ajouter</th>
                        <th scope="col">Prix</th>
                        <th scope="col">Descritpion</th>
                        <th scope="col">Type</th>
                        <th scope="col">Nombre de modèles créés</th>
                        <th scope="col">Plus de Détails</th>
                        <th scope="col">Modifications</th>
                        <!-- <th scope="col">Disponibilité</th> -->
                    </tr>
                </thead>
                <?php
                // select itemes from database
                ?>
                <tbody>
                    <!-- show items on the page -->
                    <?php

                    foreach ($models as $model) { ?>
                        <tr>
                            <td class="col-1">
                                <?= $model->getName(); ?>

                            <td class="col-1">
                                <?= $model->getAddDate(); ?>
                            </td>
                            <td class="col-1">
                                <?= $model->getPrice(); ?>
                            </td>
                            <td class="col-3">
                                <?= $model->getDescriptionModel(); ?>
                            </td>

                            <td class="col-1">
                                <?= $model->getModelType(); ?>
                            </td>
                            <td class="col-1">
                                <?= $model->getModelQuantity(); ?>
                            </td>
                            <td class="col-1">
                                <a href="?page=detailsModel&idModel=<?= $model->getIdModel(); ?>"
                                    class="btn btn-primary">Détails</a>
                            </td>
                            <td class="col-1">
                                <a href="?page=updateModel&idModel=<?= $model->getIdModel(); ?>"
                                    class="btn btn-primary">Modifier</a>
                            </td>
                        </tr>

                        <?php
                    } ?>

                </tbody>
            </table>
        </div>

    </section>
</main>