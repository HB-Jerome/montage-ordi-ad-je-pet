<?php
namespace Controller;

use Model\ModelPc;
use Service\ModelHandler;

use PDO;

class UpdateModelController extends AbstractController
{
    public function getFileName(): string
    {
        return 'updateModel';
    }

    public function getPageTitle(): string
    {
        return 'Modification modèle !';
    }

    public function getContent(): array
    {
        $modelHandler = new ModelHandler();
        $modelIsValid = false;

        // on gere les données get

        // je teste si mes variable get existe
        if (isset($_GET['idModel'])) {

            $idModel = $_GET['idModel'];
            $modelHandler->setIdModel($idModel);

            // je recupere le model avec l'id passé en  parametre get
            $model = $this->fetchModel($idModel);


            $modelIsValid = !empty($model);
            if ($modelIsValid) {
                // si le model existe i.e l'object crée est non vide on initalise model handler avec les proprieté de ce model
                $modelHandler->setName($model->getName());
                $modelHandler->setDescriptionModel($model->getDescriptionModel());
                $modelHandler->setModelQuantity($model->getModelQuantity());
                $modelHandler->setModelType($model->getModelType());

                // on recupere l'id et la quantity des composant liés au model 

                $sqlComponents = 'SELECT Component.idComponent, category, modelpc_component.quantity
                FROM Component
                LEFT JOIN modelpc_component ON modelpc_component.idComponent = component.idComponent
                WHERE modelpc_component.idModel =:idModel';
                $statementComponents = $this->db->prepare($sqlComponents);
                $statementComponents->bindValue(":idModel", $idModel, PDO::PARAM_INT);
                $statementComponents->execute();

                // on initialise modelHandler avec les id et quantity des composant
                while ($component = $statementComponents->fetch()) {
                    switch ($component['category']) {
                        case 'GraphicCard':
                            $modelHandler->setGraphicCard($component['idComponent']);
                            $modelHandler->setGraphicCardQty($component['quantity']);
                            break;

                        case 'HardDisc':
                            $modelHandler->setHardDisc($component['idComponent']);
                            $modelHandler->setHardDiscQty($component['quantity']);
                            break;

                        case 'Keyboard':
                            $modelHandler->setKeyboard($component['idComponent']);
                            $modelHandler->setKeyboardQty($component['quantity']);
                            break;

                        case 'MotherBoard':
                            $modelHandler->setMotherBoard($component['idComponent']);
                            $modelHandler->setMotherBoardQty($component['quantity']);
                            break;

                        case 'MouseAndPad':
                            $modelHandler->setMouseAndPad($component['idComponent']);
                            $modelHandler->setMouseAndPadQty(intval($component['quantity']));

                            break;

                        case 'PowerSupply':
                            $modelHandler->setPowerSupply($component['idComponent']);
                            $modelHandler->setPowerSupplyQty($component['quantity']);

                            break;
                        case 'Processor':
                            $modelHandler->setProcessor($component['idComponent']);
                            $modelHandler->setProcessorQty($component['quantity']);
                            break;

                        case 'Ram':
                            $modelHandler->setRam($component['idComponent']);
                            $modelHandler->setRamQty($component['quantity']);
                            break;

                        case 'Screen':
                            $modelHandler->setScreen($component['idComponent']);
                            $modelHandler->setScreenQty($component['quantity']);
                            break;
                    }
                }
            }
        }
        // on gere les données post 
        $modelHandler->handlePost($_POST);

        // si le formulaire est soumit et valid
        if ($modelHandler->isSubmitted() && $modelHandler->postIsValid()) {

            //Verification
            // on verifie les que les composant selectionner sont compatible entre eux
            $typeIsValid = $this->verifyData($modelHandler, $this->db);


            if ($typeIsValid) {
                $modelPc = $modelHandler->factory();

                // on update dans la bdd
                $updateModel = $this->updateModelBDD(
                    $modelPc, $modelHandler->getConfiguration()
                );
                if ($updateModel) {
                    header('Location: ?page=listModel&update=true');
                }
            }
        }
        $components = getAllComponents($this->db, false);
        return ["components" => $components, "modelHandler" => $modelHandler, "modelIsValid" => $modelIsValid];
    }

    public function fetchModel($idModel)
    {
        $sqlModel = 'SELECT * FROM ModelPc WHERE idModel= :idModel';
        $statement = $this->db->prepare($sqlModel);
        $statement->bindValue(':idModel', $idModel, PDO::PARAM_INT);
        $statement->setFetchMode(PDO::FETCH_CLASS, ModelPc::class);
        $statement->execute();
        $model = $statement->fetch();
        return $model;
    }

    public function updateModelBDD(ModelPc $modelPc, array $configuration)
    {
        $sqlModel = "UPDATE ModelPc 
        SET `name`=:name,modelQuantity=:modelQuantity,descriptionModel=:descriptionModel,modelType=:modelType
        WHERE idModel=:idModel";
        $statementModel = $this->db->prepare($sqlModel);

        $statementModel->bindValue(":idModel", $modelPc->getIdModel());
        $statementModel->bindValue(":name", $modelPc->getName());
        $statementModel->bindValue(":modelQuantity", $modelPc->getModelQuantity());
        $statementModel->bindValue(":modelType", $modelPc->getModelType());
        $statementModel->bindValue(":descriptionModel", $modelPc->getDescriptionModel());
        $statementModel->execute();

        $id = $modelPc->getIdModel();

        $sqlIntermediaryTable = "UPDATE modelpc_component SET idComponent=:idComponent,quantity=:quantity
        WHERE idModel=:idModel AND idComponent=:idComponent";
        $statementTable = $this->db->prepare($sqlIntermediaryTable);

        foreach ($configuration as $component) {

            $statementTable->bindValue(":idComponent", $component["id"]);
            $statementTable->bindValue(":quantity", $component["quantity"]);
            $statementTable->bindValue(":idModel", $id);

            $statementTable->execute();
        }
        return true;
    }
    public function verifyData(ModelHandler $modelHandler, $db)
    {
        $valid = true;
        $type = $modelHandler->getModelType();
        $components = [];
        $array = $modelHandler->getConfiguration();
        foreach ($array as $component) {
            $id = $component['id'];
            $components[] = getComponentById($id, $db);
        }
        foreach ($components as $component) {
            $componentType = $component->getComponentType();

            if (!($componentType == $type)) {
                $modelHandler->addError("Tous les types ne corresponde pas");
                return false;
            }
        }
        return $valid;
    }

}