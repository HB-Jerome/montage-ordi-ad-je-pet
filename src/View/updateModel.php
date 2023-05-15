<?php
use Model\Component;


if ($modelHandler->isSubmitted()) {
    if (empty($modelHandler->getErrors())) {
        ?>
        <div class="alert alert-success" role="alert">
            This is a success !
        </div>
        <?php
    } else {

        foreach ($modelHandler->getErrors() as $error) {
            ?>
            <div class="alert alert-danger" role="alert">
                <?= $error ?>
            </div>
            <?php
        }

    }
}



?>

<main class="container">
    <div class=" mx-auto w-75">
        <h1 class="d-flex">modification Modele</h1>
    </div>

    <div class="row">
        <form method="POST" class="mx-auto w-75">

            <div class="form-row">
                <div class="form-group col-md-10">
                    <label for="name">name</label>
                    <input type="text" class="form-control" name="name" id="name"
                        value="<?= $modelHandler->getName() ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-10">
                    <label for="modelQuantity">model Quantity</label>
                    <input type="number" class="form-control" name="modelQuantity" id="modelQuantity"
                        value="<?= $modelHandler->getModelQuantity() ?>">
                </div>
            </div>


            <div class="form-group col-md-10 ">
                <label for="Modeltype">Type</label>
                <select id="Modeltype" name="Modeltype" class="form-control">
                    <?php displayType(Component::TYPES, $modelHandler->getModelType()); ?>
                </select>
            </div>
            <div class="form-row">
                <div class="form-group col-md-10">
                    <label for="description">
                        Description
                    </label>
                    <textarea class="form-control" id="description" name="description"
                        rows="3"><?= $modelHandler->getDescriptionModel() ?></textarea>
                </div>
            </div>
            <h2>liste composants :</h2>
            <div class="row">
                <div class="form-group col-md-10 ">
                    <label for="graphicCard">CartGraphic</label>
                    <select id="graphicCard" name="graphicCard" class="form-control">
                        <?php displayOptions($components, "GraphicCard", $modelHandler->getGraphicCard()); ?>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="graphicCardQty">quantity</label>
                    <input id="graphicCardQty" name="graphicCardQty" value=<?= $modelHandler->getGraphicCardQty() ?>>

                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-10 ">
                    <label for="hardDisc">hardDisc</label>
                    <select id="hardDisc" name="hardDisc" class="form-control">
                        <?php displayOptions($components, "HardDisc", $modelHandler->getHardDisc()); ?>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="hardDiscQty">quantity</label>
                    <input id="hardDiscQty" name="hardDiscQty" value=<?= $modelHandler->getHardDiscQty() ?>>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-10 ">
                    <label for="keyboard">keyboard</label>
                    <select id="keyboard" name="keyboard" class="form-control">
                        <?php displayOptions($components, "Keyboard", $modelHandler->getKeyboard()); ?>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="keyboardQty">quantity</label>
                    <input id="keyboardQty" name="keyboardQty" value=<?= $modelHandler->getKeyboardQty() ?>>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-10 ">
                    <label for="motherBoard">motherBoard</label>
                    <select id="motherBoard" name="motherBoard" class="form-control">
                        <?php displayOptions($components, "MotherBoard", $modelHandler->getMotherBoard()); ?>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="motherBoardQty">quantity</label>
                    <input id="motherBoardQty" name="motherBoardQty" value=<?= $modelHandler->getMotherBoardQty() ?>>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-10 ">
                    <label for="mouseAndPad">mouseAndPad</label>
                    <select id="mouseAndPad" name="mouseAndPad" class="form-control">
                        <?php displayOptions($components, "MouseAndPad", $modelHandler->getMouseAndPad()); ?>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="mouseAndPadQty">quantity</label>
                    <input id="mouseAndPadQty" name="mouseAndPadQty" value=<?= $modelHandler->getMouseAndPadQty() ?>>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-10 ">
                    <label for="powerSupply">powerSupply</label>
                    <select id="powerSupply" name="powerSupply" class="form-control">
                        <?php displayOptions($components, "PowerSupply", $modelHandler->getPowerSupply()); ?>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="powerSupplyQty">quantity</label>
                    <input id="powerSupplyQty" name="powerSupplyQty" value=<?= $modelHandler->getPowerSupplyQty() ?>>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-10 ">
                    <label for="processor">processor</label>
                    <select id="processor" name="processor" class="form-control">
                        <?php displayOptions($components, "Processor", $modelHandler->getProcessor()); ?>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="processorQty">quantity</label>
                    <input id="processorQty" name="processorQty" value=<?= $modelHandler->getProcessorQty() ?>>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-10 ">
                    <label for="ram">ram</label>
                    <select id="ram" name="ram" class="form-control">
                        <?php displayOptions($components, "Ram", $modelHandler->getRam()); ?>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="ramQty">quantity</label>
                    <input id="ramQty" name="ramQty" value=<?= $modelHandler->getRamQty() ?>>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-10 ">
                    <label for="screen">screen</label>
                    <select id="screen" name="screen" class="form-control">
                        <?php displayOptions($components, "Screen", $modelHandler->getScreen()); ?>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="screenQty">quantity</label>
                    <input id="screenQty" name="screenQty" value=<?= $modelHandler->getScreenQty() ?>>
                </div>
            </div>

            <div class="py-5 text-center">
                <button class="btn btn-primary" type="submit">Update model</button>
            </div>


        </form>
    </div>
    <div>

    </div>
</main>