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
        $modelHandler->handleGet($_GET, $this->db);
        var_dump($modelHandler);
        $modelHandler->handlePost($_POST);

        if ($modelHandler->isSubmitted() && $modelHandler->postIsValid()) {
            $typeIsValid = $this->verifyData($modelHandler, $this->db);

            if ($typeIsValid) {
                $modelPc = $modelHandler->factory();
                $updateModel = $this->updateModelBDD(
                    $modelPc, $modelHandler->getConfiguration()
                );
                if ($updateModel) {
                    header('Location: ?page=listModel&update=true');
                }
            }

        }
        $components = getAllComponents($this->db);
        return ["components" => $components, "modelHandler" => $modelHandler];
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