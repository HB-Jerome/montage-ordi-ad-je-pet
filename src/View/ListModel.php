<main>
    <section>
        <!-- add the filtre of items per category
         -->
        <h1 class="text-center">Liste des modèles</h1>
        <!-- filtre -->
        <div class=" d-md-flex align-item-center gap-3 ">
            <!--  filter -->
            <div id="listPiece-form">
                <form action="" method="post">
                    <select id="filter-from" class="form-select mb-2" name="sortBy">
                        <option value="">Trier par</option>
                        <option <?php if ($listFilter->getSortBy() == 'price') {
                            echo 'selected';
                        } ?> value="price">Prix
                        </option>
                        <option <?php if ($listFilter->getSortBy() == 'nbrPcCreated') {
                            echo 'selected';
                        } ?>
                            value="nbrPcCreated"> nbr Pc Created</option>
                        <option <?php if ($listFilter->getSortBy() == 'name') {
                            echo 'selected';
                        } ?> value="name">Nom</option>
                        <option value="addDate" <?php if ($listFilter->getSortBy() == 'name') {
                            echo 'addDate';
                        } ?>>date ajout</option>
                    </select>
                    <hr id="h">

                    <!-- category filter -->
                    <!-- brand/marque filter -->

                    <!-- isArchived filter -->
                    <select id="filter-from" class="form-select mt-2" name="isArchived">
                        <option value=0 >Non archivé</option>
                        <option value=1 <?php if ($listFilter->getIsArchived() == 1) {
                            echo 'selected';
                        } ?> >Archivé inclus</option>
                    </select>

                    <!-- price min -->
                    <div class="mt-4 rounded-2">
                        <?php // var_dump($filters, $brandResults); ?>
                        <label for="minPrice">Prix minimum</label><br>
                        <input name="minPrice" placeholder="MinPrice" value="<?=$listFilter->getMinPrice()?>">
                    </div>

                    <!-- price max -->
                    <div class="mt-4 rounded-2">
                        <label for="maxPrice">Prix maximum</label><br>
                        <input name="maxPrice" placeholder="maxPrice" value="<?=$listFilter->getMaxPrice()?>">
                    </div>

                    <hr id="h">
                    <!-- filter per stock -->
                    <div class>
                        <input name="nonReadComent" type="radio" value=0 id="tout" <?php if($listFilter->getNonReadComent()==0){echo "checked";} ?>>
                        <label for="tout">Voir Tous</label>
                        <br>
                        <input name="nonReadComent" value=1 type="radio" id="non-lu"<?php if($listFilter->getNonReadComent()==1){echo "checked";} ?>>
                        <label for="non-lu">commentaires non-lu</label>
                    </div>
                    <div class="ms-4 mt-3">
                        <input type="submit" value="submit" class="btn btn-primary">
                    </div>
                </form>
            </div>
            <!-- table liste -->
            <table id="tableList" class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Id Model</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Date d'ajout</th>
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
                                <?= $model->getIdModel(); ?>
                            </td>
                            <td class="col-1">
                                <?= $model->getName(); ?>
                            </td>
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
                                <?= $model->getNbrPcCreated(); ?>
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