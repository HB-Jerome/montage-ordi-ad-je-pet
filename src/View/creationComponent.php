<main class="container">
    <?php foreach ($errors as $error) {
        ?>
        <div class="alert alert-danger" role="alert">
            <?= $error ?>
        </div>
        <?php
    } ?>



    <h1 class="text-center">Creation Composant</h1>

    <form method="POST" style="" class="">
        <div class="col-md-6 offset-md-3">
            <h3>Attribut généraux</h3>
            <div class="form-group ">
                <label for="name">name</label>
                <input type="text" class="form-control" name="name" id="name" value="<?= $component->getName() ?>">
            </div>
            <div class="form-group">
                <label for="brand">brand</label>
                <input type="text" class="form-control" name="brand" id="brand" value="<?= $component->getBrand() ?>">
            </div>
            <div class="form-group ">
                <label for="description">description</label>
                <textarea class="form-control" name="description" id="description"
                    value="<?= $component->getDescription() ?>" rows="3"><?= $component->getDescription() ?></textarea>
            </div>
            <div class="form-group">
                <label for="price">price</label>
                <input type="text" class="form-control" name="price" id="price" value="<?= $component->getPrice() ?>">
            </div>
            <div class="form-group col-8">
                <label for="componentType">component Type</label>
                <select id="componentType" class="form-control" name="componentType">
                    <?php foreach ($componentsTypes as $type) {
                        ?>
                        <option <?php echo $string = ($component->getComponentType() == $type) ? "selected" : ""; ?>
                            value="<?= $type ?>"><?= $type ?></option>
                        <?php
                    } ?>
                </select>
            </div>

            <div class="form-group col-8">
                <h3 class="py-3">Attributs Spécifiques</h3>
                <label for="category">category</label>
                <select id="category" class="form-control" name="category">
                    <option selected></option>
                    <?php foreach ($availlablesCategories as $availablecategory) {
                        ?>
                        <option <?php echo $string = ($component->getCategory() == $availablecategory) ? "selected" : ""; ?>
                            value="<?= $availablecategory ?>"><?= $availablecategory ?></option>
                        <?php
                    } ?>

                </select>
            </div>

            <div id="attributChild">
                <!-- TO FETCH ALL UPDATE FORMS FILES FROM VIEW/UPDATE FOR CHILD CLASS UPDATES -->
                <!-- $category from $category = $_GET['category']; -->
                <?php
                if (!empty($component->getCategory())) {
                    include 'CreateComponent/' . lcfirst($component->getCategory()) . '.php';
                }
                ?>
            </div>
        </div>
        <div class="py-5 text-center">
            <button class="btn btn-primary" type="submit">Cree la piece</button>
        </div>
    </form>
</main>

<!-- charger les imput FORMS correspondant aux attribut spécifique lorsque les donné post ne sont pas encore envoyé (i.e la du 1er chargement de page ou bien lors du changement de categorie -->
<script src="assets/js/creationComponent.js"></script>