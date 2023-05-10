<?php

namespace Controller;

use PDO;
use Model\ModelPc;


class ListModelController extends AbstractController
{
    public function getContent(): array
    {

        $models = $this->getModels();

        return ["models" => $models];
    }

    public function getFileName(): string
    {
        return 'listModel';
    }

    public function getPageTitle(): string
    {
        return 'Liste des Modeles !';
    }
    public function getModels()
    {
        $sql = 'SELECT m.*, SUM(c.price*mc.quantity) as price FROM modelpc AS m
        INNER JOIN modelpc_component AS mc ON m.idModel = mc.idModel
        INNER JOIN component AS c ON mc.idComponent = c.idComponent
        GROUP BY m.idModel';
        $statement = $this->db->prepare($sql);
        $statement->setFetchMode(PDO::FETCH_CLASS, ModelPc::class);
        $statement->execute();
        $models = $statement->fetchAll();
        var_dump($models);
        return $models;
    }

}