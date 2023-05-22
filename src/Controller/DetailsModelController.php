<?php

namespace Controller;

use PDO;
use Model\HardDisc;
use Model\ModelPc;
use Controller\ListModelController;
use Service\ComponentFactory;

class DetailsModelController extends AbstractController
{
    public function getContent(): array
    {
        $sqlModel = "SELECT * FROM modelpc";
        $statementModel = $this->db->prepare($sqlModel);
        $statementModel->setFetchMode(PDO::FETCH_CLASS, ModelPc::class);
        $statementModel->execute();
        $modelResults = $statementModel->fetchAll();

        $sqlModelCat = "SELECT *, c.idComponent as idComponent, c.quantity as quantity 
        FROM Component as c 
                    LEFT JOIN modelpc_component ON c.idComponent = modelpc_component.idComponent 
                    LEFT JOIN GraphicCard as g on c.idComponent =g.idComponent 
                    LEFT JOIN HardDisc as h on c.idComponent =h.idComponent 
                    LEFT JOIN Keyboard as k on c.idComponent =k.idComponent 
                    LEFT JOIN MotherBoard as mb on c.idComponent =mb.idComponent 
                    LEFT JOIN MouseAndPad as mp on c.idComponent =mp.idComponent 
                    LEFT JOIN PowerSupply as ps on c.idComponent =ps.idComponent 
                    LEFT JOIN Processor as p on c.idComponent =p.idComponent 
                    LEFT JOIN Ram as r on c.idComponent =r.idComponent 
                    LEFT JOIN Screen as s on c.idComponent = s.idComponent 
        WHERE modelpc_component.idModel=1"; 
        $modelCatStatement = $this->db->prepare($sqlModelCat);
        $modelCatStatement->execute();
        $components = [];
        while ($result = $modelCatStatement->fetch()) {
            $components[] = (new ComponentFactory)->create($result);
        }

        return ["modelResults" => $modelResults,"components" => $components,];
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