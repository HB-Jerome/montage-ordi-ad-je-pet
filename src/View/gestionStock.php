<main class="container">
    <?php
    foreach ($errors as $error) {
        ?>
        <div class="alert alert-danger" role="alert">
            <?= $error ?>
        </div>

        <?php
    }
    if ($idComponentIsValid) {
        ?>

        <h1 class="text-center">Historique Composant</h1>
        <div class="card mb-3">
            <!-- <img class="card-img-top" src="..." alt="Card image cap"> -->
            <div class="card-body">
                <!-- Propriétés de la classe mère -->
                <h5 class="card-title">Nom :
                    <?= $component->getName() ?>
                </h5>
                <p class="card-text"> Marque :
                    <?= $component->getBrand() ?>
                </p>
                <p class="card-text"> Prix :
                    <?= $component->getPrice() ?> €
                </p>
                <p class="card-text"> Description :
                    <?= $component->getDescription() ?>
                </p>
                <p class="card-text"> Catégorie :
                    <?= $component->getCategory() ?>
                </p>
                <a href="?page=detailsProduit&idComponent=<?= $component->getIdComponent(); ?>" class="btn btn-primary">Voir
                    détail</a>


                <form class="mx-auto w-75" method="POST">
                    <h2 class="text-center my-5">Gestion du stock</h2>
                    <div class="form-row col-md-4 offset-md-4">
                        <h3>En stock:
                            <?= $component->getQuantity() ?>
                        </h3>
                    </div>

                    <div class="form-row ">
                        <div class="form-group col-md-4 offset-md-4">
                            <label for="addedRemoved">Action</label>
                            <select id="addedRemoved" name="addedRemoved" class="form-control">
                                <option selected value=""></option>
                                <option value="add">Ajout</option>
                                <option value="remove">Retrait</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4 offset-md-4 ">
                            <label for="quantity">Quantity</label>
                            <input type="number" class="form-control" id="quantity" name="quantity">
                        </div>
                        <div class="text-center my-5">
                            <button type="submit" class="btn btn-primary mx-auto">Executer</button>
                        </div>

                </form>
            </div>
        </div>

        <section>

            <h2 class="text-center my-5">Historique du stock</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">id StockHistory</th>
                        <th scope="col">Date de modification</th>
                        <th scope="col">quantity</th>
                        <th scope="col">Type modification</th>
                    </tr>
                </thead>
                <?php
                foreach ($history as $entry) { ?>
                    <tr>
                        <td class="col-1">
                            <?= $entry->getIdStockHistory(); ?>

                        <td class="col-2">
                            <?= $entry->getModificationDate(); ?>
                        </td>
                        </td>
                        <td class="col-1">
                            <?= $entry->getQuantity(); ?>
                        </td>
                        <td class="col-1">
                            <?php echo $string = ($entry->getAddedRemoved()) ? "ajout" : "retrait"; ?>
                        </td>
                    <tr>
                        <?php
                } ?>

                    <table>
        </section>

    <?php } ?>
</main>