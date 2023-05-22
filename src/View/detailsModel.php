<section>
    <h2 class="text-center mt-5 mb-5">Détails d'un modèlé</h2>
    <table id="tableListModel" class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">Nom</th>
                <th scope="col">Description</th>
                <th scope="col">Type</th>
                <th scope="col">Quantity</th>
                <th scope="col">Date d'ajout</th>
                <!-- categorychild -->
            </tr>
        </thead>
        <tbody>
            <?php foreach ($modelResults as $modelResult) { ?>
                <tr>
                    <td class="col-1">
                        <?= $modelResult->getName(); ?>

                    <td class="col-3">
                        <?= $modelResult->getDescriptionModel(); ?>
                    </td>
                    </td>
                    <td class="col-1">
                        <?= $modelResult->getModelType(); ?>
                    </td>
                    <td class="col-1">
                        <?= $modelResult->getModelQuantity(); ?>
                    </td>
                    <td class="col-1">
                        <?= $modelResult->getAddDate(); ?>
                    </td>
                </tr>
                <!-- categorychild -->
                <?php
            } ?>

        </tbody>
    </table>
    <form action="" method="post">
        <div class="form-floating">
            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
            <label for="floatingTextarea">Comments</label>
        </div>
        <div class = "text-center m-5">
        <button type="submit" class="btn btn btn-success">Envoyer</button>
        </div>
    </form>
</section>