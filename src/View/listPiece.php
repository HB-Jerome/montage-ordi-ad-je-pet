<section>
    <!-- add the filtre of items per category
         -->
    <h2 class="text-center p-4">Liste des pièces</h2>
    <!-- filtre -->
    <div class=" d-md-flex align-item-center gap-3 ">
        <!--  filter -->
        <form id="listPiece-form" action="" method="post" class="position-fixed">
            <select id="filter-from" class="form-select mb-2" name="trier">
                <option value="">Trier par</option>
                <option value="price">Prix</option>
                <option value="quantity">Quantité</option>
                <option value="name">Nom</option>
                <option value="category">Catégorie</option>
            </select>
            <h4>Filtre par</h4>
            <!-- category filter -->
            <select id="filter-from" class="form-select mb-2" name="category">
                <option value="">Choisir une catégorie</option>
                <?php foreach ($catResults as $cat) { ?>

                    <option value="<?= $cat; ?>"><?= $cat; ?></option>
                <?php } ?>
            </select>
            <!-- brand/marque filter -->
            <select id="filter-from" class="form-select mt-2" name="brand">
                <option value="" selected>Choisir une Marque</option>
                <?php foreach ($brandResults as $brand) {
                    ?>
                    <option value="<?= $brand['brand']; ?>">
                        <?= $brand['brand']; ?>
                    </option>
                <?php } ?>

            </select>
            <!-- isArchived filter -->
            <select id="filter-from" class="form-select mt-2" name="isArchived">
                <option value="0" selected>Non archivé</option>
                <option value="1">Archivé</option>
            </select>

<<<<<<< HEAD
            <!-- price min -->
            <div class="mt-4 rounded-2">
                <?php // var_dump($filters, $brandResults); ?>
                <input name="minPrice" placeholder="MinPrice" value="<?= $filters->getMinPrice(); ?>">
            </div>

            <!-- price max -->
            <div class="mt-4 rounded-2">
                <input name="maxPrice" placeholder="maxPrice" value="<?= $filters->getMaxPrice(); ?>">
            </div>
            <div class="ms-4 mt-3">
                <input type="submit" value="submit" class="btn btn-primary">
            </div>
        </form>
         <!-- table Liste -->
         <table id="tableList" class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">Nom</th>
                <th scope="col">Marque</th>
                <th scope="col">Prix</th>
                <th scope="col">Quantité en Stock</th>
                <th scope="col">Categorie</th>
                <!-- <th scope="col">Nombre de modèles créés</th> -->
                <th scope="col">Plus de Détails</th>
                <th scope="col">Modifications</th>
                <!-- <th scope="col">Disponibilité</th> -->
                <th scope="col">Supprimer</th>
            </tr>
        </thead>
        <?php
        // select itemes from database
        ?>
        <tbody>
            <!-- show items on the page -->
=======
                <!-- price max -->
                <div class="mt-4 rounded-2">
                    <input name="maxPrice" placeholder="maxPrice" value="<?= $filters->getMaxPrice(); ?>">
                </div>
                <div class="ms-4 mt-3">
                    <input name="quantity" type="submit" value="submit" class="btn btn-primary">
                </div>
            </form>
        </div>
        <!-- table Liste -->
        <table id="tableList" style="margin-left: 220px;" class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Marque</th>
                    <th scope="col">Prix</th>
                    <th scope="col">Type de Pc</th>
                    <th scope="col">Categorie</th>
                    <th scope="col">Disponibilité</th>
                    <th scope="col">Ajouter</th>
                    <th scope="col">Détails</th>
                    <!-- <th scope="col">Disponibilité</th> -->
                </tr>
            </thead>
>>>>>>> 9b063ea (page détails produit terminée)
            <?php

            foreach ($results as $result) { ?>
                <tr>
                    <td class="col-3">
                        <?= $result['name']; ?>
                    </td>
                    <td class="col-1">
                        <?= $result['brand']; ?>
                    </td>
                    <td class="col-1">
                        <?= $result['price']; ?>
                    </td>
                    <td class="col-1">
                        <?= $result['quantity']; ?>
                    </td>

                    <td class="col-1">
                        <?= $result['category']; ?>
                    </td>
                    <td class="col-1">
                        <a href="" type="submit" class="btn btn-primary">Détails</a>
                    </td>
                    <td class="col-1">
                        <a href="" type="submit" class="btn btn-primary">Modifier</a>
                    </td>
                    
                    <td class="col-1">
                        <a href="" type="submit" class="btn btn-primary">Suppression</a>
                    </td>
                </tr>

                <?php
            } ?>

<<<<<<< HEAD
        </tbody>
=======
                foreach ($results as $result) { ?>
                    <tr>
                        <td class="col-3">
                            <?= $result['name']; ?>
                        </td>
                        <td class="col-1">
                            <?= $result['brand']; ?>
                        </td>
                        <td class="col-1">
                            <?= $result['price']; ?>
                        </td>
                        <td class="col-1">
                            <?= $result['pcType']; ?>
                        </td>

                        <td class="col-1">
                            <?= $result['category']; ?>
                        </td>
                        <td class="col-1">
                            <?= $result['isArchived']; ?>
                        </td>
                        <td class="col-1">
                            <a href="?page=detailsProduit&idComponent=<?=$result['idComponent']?>" class="btn btn-primary">Add</a>
                        </td>
                        <td class="col-1">
                            <a href="?page=detailsProduit&idComponent=<?=$result['idComponent']?>" class="btn btn-primary">Détails</a>
                        </td>
                    </tr>

                    <?php
                } ?>

            </tbody>
>>>>>>> 9b063ea (page détails produit terminée)
        </table>
    </div>

</section>