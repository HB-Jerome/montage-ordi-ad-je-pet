<?php
namespace Controller;

use Model\ModelPc;
use Service\ModelHandler;

use PDO;

class ModelCreationController extends AbstractController
{
    public function getFileName(): string
    {
        return 'ModelCreation';
    }

    public function getPageTitle(): string
    {
        return 'Creation modèle !';
    }

    public function getContent(): array
    {
        $modelHandler = new ModelHandler();
        $modelHandler->handlePost($_POST);
        if ($modelHandler->isSubmitted() && $modelHandler->postIsValid()) {
            $typeIsValid = $this->verifyData($modelHandler, $this->db);

            if ($typeIsValid) {
                $modelPc = $modelHandler->factory();
                $this->insertModelBDD($modelPc, $modelHandler->getConfiguration());
            }
        }

        $components = getAllComponents($this->db);
        return ["components" => $components, "modelHandler" => $modelHandler];
    }

    public function insertModelBDD(ModelPc $modelPc, array $configuration)
    {
        $sqlModel = "INSERT INTO ModelPc (name,modelQuantity,descriptionModel,modelType,addDate,isArchived) VALUES (:name,:modelQuantity,:descriptionModel,:modelType,:addDate,:isArchived)";
        $statementModel = $this->db->prepare($sqlModel);
        $statementModel->bindValue(":name", $modelPc->getName());
        $statementModel->bindValue(":modelQuantity", $modelPc->getModelQuantity());
        $statementModel->bindValue(":modelType", $modelPc->getModelType());
        $statementModel->bindValue(":descriptionModel", $modelPc->getDescriptionModel());
        $statementModel->bindValue(":addDate", $modelPc->getAddDate());
        $statementModel->bindValue(":isArchived", $modelPc->getIsArchived());
        $statementModel->execute();

        $id = $this->db->lastInsertId();
        $id = intval($id);

        $sqlIntermediaryTable = "INSERT INTO modelpc_component (idComponent,idModel,quantity) VALUES (:idComponent,:idModel,:quantity)";
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
                $modelHandler->addError("Tous les types ne correspondent pas");
                return false;
            }
        }
        return $valid;
    }
}