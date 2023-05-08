<?php
if (empty($ModelFactory->getErrors())) {
    ?>
    <div class="alert alert-success" role="alert">
        This is a success !
    </div>
    <?php
} else {
    foreach ($ModelFactory->getErrors() as $error) {
        ?>
        <div class="alert alert-danger" role="alert">
            <?= $error ?>
        </div>
        <?php
    }
}


?>

<main class="container">
    <h1 class="d-flex">Creation Modele</h1>

    <h2>liste composants :</h2>
    <div class="row">
        <form method="POST">

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">name</label>
                    <input type="text" class="form-control" name="name" id="inputEmail4" placeholder="name">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="GraphicCard">CartGraphic</label>
                    <select id="GraphicCard" name="GraphicCard" class="form-control">
                        <?php displayOptions($Components, "GraphicCard"); ?>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="HardDisc">HardDisc</label>
                    <select id="HardDisc" class="form-control" name="HardDisc">
                        <?php displayOptions($Components, "HardDisc"); ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="MotherBoard">MotherBoard</label>
                    <select id="MotherBoard" name="MotherBoard" class="form-control">
                        <?php displayOptions($Components, "MotherBoard"); ?>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="MouseAndPad">MouseAndPad</label>
                    <select id="MouseAndPad" name="MouseAndPad" class="form-control">
                        <?php displayOptions($Components, "MouseAndPad"); ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="PowerSupply">PowerSupply</label>
                    <select id="PowerSupply" name="PowerSupply" class="form-control">
                        <?php displayOptions($Components, "PowerSupply"); ?>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="Processor">Processor</label>
                    <select id="Processor" name="Processor" class="form-control">
                        <?php displayOptions($Components, "Processor"); ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="Ram">Ram</label>
                    <select name="Ram" id="Ram" class="form-control">
                        <?php displayOptions($Components, "Ram"); ?>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="Screen">Screen</label>
                    <select name="Screen" id="Screen" class="form-control">
                        <?php displayOptions($Components, "Screen"); ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="Ram">Ram</label>
                    <select name="Keyboard" id="Keyboard" class="form-control">
                        <?php displayOptions($Components, "Keyboard"); ?>
                    </select>
                </div>
            </div>

            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary my-5">Creer</button>
            </div>

        </form>
    </div>
</main>