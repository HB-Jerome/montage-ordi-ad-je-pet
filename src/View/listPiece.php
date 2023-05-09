<section>
    <!-- add the filtre of items per category
         -->
    <h2 class="text-center p-4">Liste des pièces</h2>
    <!-- filtre -->
    <div class=" d-md-flex align-item-center gap-3 ">
        <div>
            <form action="" method="post" class="">
                <!-- category filter -->
                <select id="filter-from" class="form-select mb-4" name="category">
                    <option value="">Choisir une catégorie</option>
                    <?php foreach ($catResults as $cat) { ?>
                        <option value="<?= $cat; ?>"><?= $cat; ?></option>
                    <?php } ?>
                </select>
                <!-- brand/marque filter -->
                <select id="filter-from" class="form-select mt-4" name="brand">
                    <option value="" selected>Choisir une Marque</option>
                    <?php foreach ($brandResults as $brand) { ?>
                        <option value="<?= $brand['brand']; ?>">
                            <?= $brand['brand']; ?>
                        </option>
                    <?php } ?>

                </select>
                <!-- isArchived filter -->
                <select id="filter-from" class="form-select mt-4" name="isArchived">
                    <option value="0" selected>Non archivé</option>
                    <option value="1">Archivé</option>
                </select>

                <!-- price min -->
                <div class="mt-4 rounded-2">
                    <input name="minPrice" placeholder="MinPrice ">
                </div>

                <!-- price max -->
                <div class="mt-4 rounded-2">
                    <input name="maxPrice" placeholder="maxPrice">
                </div>
                <div class="ms-4 mt-3">
                    <input type="submit" value="submit" class="btn btn-primary">
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
                    <!-- <th scope="col">Disponibilité</th> -->
                </tr>
            </thead>
            <?php
            // select itemes from database
            ?>
            <tbody>
                <!-- show items on the page -->
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
                            <?= $result['pcType']; ?>
                        </td>

                        <td class="col-1">
                            <?= $result['category']; ?>
                        </td>
                        <td class="col-1">
                            <?= $result['isArchived']; ?>
                        </td>
                        <td class="col-1">
                            <a type="submit" class="btn btn-primary">Add</a>
                        </td>
                    </tr>

                    <?php
                } ?>

            </tbody>
        </table>
    </div>

</section>