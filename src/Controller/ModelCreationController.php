<?php

namespace Controller;

use Model\ModelPc;
use Service\ModelHandler;
use Model\GraphicCard;
use Model\HardDisc;
use Model\Keyboard;
use Model\MouseAndPad;
use Model\PowerSupply;
use Model\Processor;
use Model\Ram;
use Model\Screen;
use Model\MotherBoard;
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

        $ModelHandler = new ModelHandler($_POST);
        if ($ModelHandler->isSubmitted() && $ModelHandler->modelIsValid()) {
            $modelPc = $ModelHandler->factory();
            $this->insertModelBDD($modelPc);

        }
        $Components = $this->getComponents();
        return ["Components" => $Components, "ModelHandler" => $ModelHandler];
    }


    public function getComponents()
    {
        $classes = [
            "GraphicCard" => GraphicCard::class,
            "PowerSupply" => PowerSupply::class,
            "HardDisc" => HardDisc::class,
            "Keyboard" => Keyboard::class,
            "MouseAndPad" => MouseAndPad::class,
            "Processor" => Processor::class,
            "Ram" => Ram::class,
            "Screen" => Screen::class,
            "MotherBoard" => MotherBoard::class,
        ];

        $sql = "SELECT  c.idComponent, category FROM component as c
    ";
        $statement = $this->db->prepare($sql);
        $statement->execute();
        $results = $statement->fetchAll();
        foreach ($results as $result) {

            $class = $classes[$result["category"]];
            $id = $result["idComponent"];
            $TableName = $result["category"];
            $sqlClass = 'SELECT * FROM Component as c 
                            INNER JOIN ' . $TableName . '  AS g ON c.idComponent = g.idComponent WHERE c.idComponent=' . $id;
            $statementClass = $this->db->prepare($sqlClass);
            $statementClass->setFetchMode(PDO::FETCH_CLASS, $class);
            $statementClass->execute();
            $Component = $statementClass->fetch();
            $Components[] = $Component;

        }
        return $Components;
    }

    public function insertModelBDD(ModelPc $modelPc)
    {
        $sqlModel = "INSERT INTO ModelPc (name,quantity,addDate,isArchived) VALUES (:name,:quantity,:addDate,:isArchived)";
        $statementModel = $this->db->prepare($sqlModel);
        $statementModel->bindValue(":name", $modelPc->getName());
        $statementModel->bindValue(":quantity", $modelPc->getQuantity());
        $statementModel->bindValue(":addDate", $modelPc->getAddDate());
        $statementModel->bindValue(":isArchived", $modelPc->getIsArchived());
        $statementModel->execute();

        $id = $this->db->lastInsertId();
        $id = intval($id);

        $sqlIntermediaryTable = "INSERT INTO modelpc_component (idComponent,idModel,quantity) VALUES (:idComponent,:idModel,:quantity)";
        $statementTable = $this->db->prepare($sqlIntermediaryTable);
        foreach ($modelPc->getConfiguration() as $component) {

            $statementTable->bindValue(":idComponent", $component["id"]);
            $statementTable->bindValue(":quantity", $component["quantity"]);
            $statementTable->bindValue(":idModel", $id);

            $statementTable->execute();
        }
        ;


    }
}