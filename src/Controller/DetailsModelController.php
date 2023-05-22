<?php

namespace Controller;

use PDO;
use Model\HardDisc;
use Model\ModelPc;
use Controller\ListModelController;

class DetailsModelController extends AbstractController
{
    public function getContent(): array
    {
        $sqlModel = "SELECT * FROM modelpc";
        $statementModel = $this->db->prepare($sqlModel);
        $statementModel->setFetchMode(PDO::FETCH_CLASS, ModelPc::class);
        $statementModel->execute();
        $modelResults = $statementModel->fetchAll();

        $sqlModelComplete = "SELECT * FROM `modelpc` LEFT JOIN modelpc_component ON modelpc.idModel = modelpc_component.idModel";
        $statementCatModel = $this->db->prepare($sqlModelComplete); 
        $statementCatModel ->setFetchMode(PDO::FETCH_CLASS, ModelPc::class);
        $statementCatModel->execute();
        $CatmodelResults= $statementModel->fetchAll();
        
        var_dump($CatmodelResults);

        return ["modelResults" => $modelResults,];
    }
    public function getFileName(): string
    {
        return "detailsModel";
    }
    public function getPageTitle(): string
    {
        return "Détails d'un Model";
    }
}