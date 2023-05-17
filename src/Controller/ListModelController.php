<?php

namespace Controller;

use PDO;
use Service\ListModelHandler;
use Model\ModelPc;


class ListModelController extends AbstractController
{
    public function getContent(): array
    {
        $params = []; //  avoid SQL injection attacks
        $criteriasWhere = []; //  avoid SQL injection attacks
        $criteriasHaving = []; //  avoid SQL injection attacks
        $listFilter = new ListModelHandler($_POST);

        $sql = 'SELECT mp.*, SUM(c.price*mc.quantity) as price  FROM modelpc AS mp
        LEFT JOIN modelpc_component AS mc ON mp.idModel = mc.idModel
        LEFT JOIN component AS c ON mc.idComponent = c.idComponent
        LEFT JOIN comment as cm ON cm.idModel = mp.idModel ';

        if (!empty($listFilter->getMinPrice())) {
            $criteriasHaving[] = 'price >= :minprice';
            $params[':minprice'] = $listFilter->getMinPrice(); //minprice params 
        }
        if (!empty($listFilter->getMaxPrice())) {
            $criteriasHaving[] = 'price <= :maxprice';
            $params[':maxprice'] = $listFilter->getMaxPrice(); //minprice params 
        }
        if (!empty($listFilter->getIsArchived())) {
            $criteriasWhere[] = '(mp.isArchived = false OR mp.isArchived=:isArchived)';
            $params[':isArchived'] = $listFilter->getIsArchived(); //minprice params 
        }
        if (!empty($listFilter->getNonReadComent())) {
            $criteriasWhere[] = 'messageSeen = :messageSeen';
            $params[':messageSeen'] = $listFilter->getNonReadComent(); //minprice params 
        }

        if (!empty($criteriasWhere)) {
            $sql .= ' WHERE ' . implode(' AND ', $criteriasWhere);

        }
        $sql .= ' GROUP BY mp.idModel';
        if (!empty($criteriasHaving)) {
            $sql .= ' HAVING ' . implode(' AND ', $criteriasHaving);
        }

        if (!empty($listFilter->getSortBy())) {
            $sql .= ' ORDER BY ' . $listFilter->getSortBy();
        } else {
            $sql .= ' ORDER BY name ASC';
        }


        $statement = $this->db->prepare($sql);
        $statement->setFetchMode(PDO::FETCH_CLASS, ModelPc::class);
        $statement->execute($params);
        $models = $statement->fetchAll();

        return ["models" => $models, "listFilter" => $listFilter];
    }

    public function getFileName(): string
    {
        return 'listModel';
    }

    public function getPageTitle(): string
    {
        return 'Liste des Modeles !';
    }
}