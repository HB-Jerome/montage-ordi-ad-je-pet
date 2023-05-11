<?php


if ($ModelHandler->isSubmitted()) {
    if (empty($ModelHandler->getErrors())) {
        ?>
        <div class="alert alert-success" role="alert">
            This is a success !
        </div>
        <?php
    } else {

        foreach ($ModelHandler->getErrors() as $error) {
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
    <h1 class="d-flex">Creation Modele</h1>

    <h2>liste composants :</h2>
    <div class="row">
        <form method="POST">

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="name">name</label>
                    <input type="text" class="form-control" name="name" id="name"
                        value="<?= $ModelHandler->getName() ?>">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-8 ">
                    <label for="graphicCard">CartGraphic</label>
                    <select id="graphicCard" name="graphicCard" class="form-control">
                        <?php displayOptions($Components, "GraphicCard", $ModelHandler->getGraphicCard()); ?>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="graphicCardQty">quantity</label>
                    <input id="graphicCardQty" name="graphicCardQty" value=<?= $ModelHandler->getGraphicCardQty() ?>>

                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-8 ">
                    <label for="hardDisc">hardDisc</label>
                    <select id="hardDisc" name="hardDisc" class="form-control">
                        <?php displayOptions($Components, "HardDisc", $ModelHandler->getHardDisc()); ?>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="hardDiscQty">quantity</label>
                    <input id="hardDiscQty" name="hardDiscQty" value=<?= $ModelHandler->getHardDiscQty() ?>>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-8 ">
                    <label for="keyboard">keyboard</label>
                    <select id="keyboard" name="keyboard" class="form-control">
                        <?php displayOptions($Components, "Keyboard", $ModelHandler->getKeyboard()); ?>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="keyboardQty">quantity</label>
                    <input id="keyboardQty" name="keyboardQty" value=<?= $ModelHandler->getKeyboardQty() ?>>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-8 ">
                    <label for="motherBoard">motherBoard</label>
                    <select id="motherBoard" name="motherBoard" class="form-control">
                        <?php displayOptions($Components, "MotherBoard", $ModelHandler->getMotherBoard()); ?>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="motherBoardQty">quantity</label>
                    <input id="motherBoardQty" name="motherBoardQty" value=<?= $ModelHandler->getMotherBoardQty() ?>>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-8 ">
                    <label for="mouseAndPad">mouseAndPad</label>
                    <select id="mouseAndPad" name="mouseAndPad" class="form-control">
                        <?php displayOptions($Components, "MouseAndPad", $ModelHandler->getMouseAndPad()); ?>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="mouseAndPadQty">quantity</label>
                    <input id="mouseAndPadQty" name="mouseAndPadQty" value=<?= $ModelHandler->getMouseAndPadQty() ?>>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-8 ">
                    <label for="powerSupply">powerSupply</label>
                    <select id="powerSupply" name="powerSupply" class="form-control">
                        <?php displayOptions($Components, "PowerSupply", $ModelHandler->getPowerSupply()); ?>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="powerSupplyQty">quantity</label>
                    <input id="powerSupplyQty" name="powerSupplyQty" value=<?= $ModelHandler->getPowerSupplyQty() ?>>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-8 ">
                    <label for="processor">processor</label>
                    <select id="processor" name="processor" class="form-control">
                        <?php displayOptions($Components, "Processor", $ModelHandler->getProcessor()); ?>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="processorQty">quantity</label>
                    <input id="processorQty" name="processorQty" value=<?= $ModelHandler->getProcessorQty() ?>>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-8 ">
                    <label for="ram">ram</label>
                    <select id="ram" name="ram" class="form-control">
                        <?php displayOptions($Components, "Ram", $ModelHandler->getRam()); ?>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="ramQty">quantity</label>
                    <input id="ramQty" name="ramQty" value=<?= $ModelHandler->getRamQty() ?>>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-8 ">
                    <label for="screen">screen</label>
                    <select id="screen" name="screen" class="form-control">
                        <?php displayOptions($Components, "Screen", $ModelHandler->getScreen()); ?>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="screenQty">quantity</label>
                    <input id="screenQty" name="screenQty" value=<?= $ModelHandler->getScreenQty() ?>>
                </div>
            </div>

            <div class="py-5 text-center">
                <button class="btn btn-primary" type="submit">Create model</button>
            </div>


        </form>
    </div>
</main>