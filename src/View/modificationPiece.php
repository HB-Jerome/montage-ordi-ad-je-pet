<section>
    <div id="pieceModifs" class="d-flex  align-items-center gap-5 text-center">
        <aside class="">
            <h3>Photos des Piéces à Modifier</h3>
            <img width="200px" height="200px" src="..." class="rounded float-start" alt="..."><br>
            <img width="200px" height="200px" src="..." class="rounded float-start" alt="...">
        </aside>
        <!-- form pieceModification -->
        <form method="POST">

        

            <div class="">
                <div class="form-group">
                    <label for="name">name</label>
                    <input type="text" class="form-control" name="name" id="name" value="<?= $updateResult->getName(); ?>">
                </div>
                <div class="form-group">
                    <label for="brand">brand</label>
                    <input type="text" class="form-control" name="brand" id="brand" value="<?= $updateResult->getBrand(); ?>">
                </div>
                <div class="form-group">
                    <label for="description">description</label>
                    <input type="text" class="form-control" name="description" id="description" value="<?= $updateResult->getDescription(); ?>">
                </div>
                <div class="form-group">
                    <label for="price">price</label>
                    <input type="text" class="form-control" name="price" id="price" value="<?= $updateResult->getPrice(); ?>">
                </div>
                <div class="form-group">
                    <label for="componentType">component Type</label>
                    <input type="text" class="form-control" name="componentType" id="componentType" value="<?= $updateResult->getComponentType(); ?>">
                </div>

                <!-- TO FETCH ALL UPDATE FORMS FILES FROM VIEW/UPDATE FOR CHILD CLASS UPDATES -->
                <!-- $category from $category = $_GET['category']; -->
                <?php include 'update/' . lcfirst($category) . '.php'; ?>

            </div>
            <div class="py-5 text-center">
                <button class="btn btn-primary" type="submit">Modifier une piéce</button>
            </div>


        </form>
    </div>
</section>