<?php

namespace Controller;

use Model\HistoryComponent;

use PDO;


class GestionStockController extends AbstractController
{

    protected bool $postIsSubmited = false;
    protected bool $postIsValid = true;
    protected bool $postIscomplete = true;
    public function getContent(): array
    {
        if (isset($_GET['idComponent']) && !empty($_GET['idComponent'])) {
            $idComponent = $_GET['idComponent'];
            $component = getComponentById($idComponent, $this->db);
            $idComponentIsValid = !empty($component);

            if ($idComponentIsValid) {
                $history = $this->getHistoricComponent($idComponent);
                $this->handlePost($_POST);

                if ($this->postIsSubmited && $this->postIsValid && $this->postIscomplete) {
                    $succes = $this->modifyStock($_POST, $idComponent);

                    if ($succes) {
                        header("location: ?page=gestionStock&idComponent=" . $idComponent);
                    }

                }
            } else {
                $this->errors[] = "Component not found !";
            }
        } else {
            $idComponentIsValid = false;
            $this->errors[] = "Component not found !";
        }

        return ["history" => $history, "idComponentIsValid" => $idComponentIsValid, "component" => $component, "errors" => $this->errors];
    }

    public function getFileName(): string
    {
        return 'gestionStock';
    }

    public function getPageTitle(): string
    {
        return 'historic stock component !';
    }

    public function getHistoricComponent(int $id)
    {

        $sql = 'SELECT * FROM stockhistory WHERE idComponent = :idComponent ORDER BY modificationDate DESC LIMIT 20';
        $statement = $this->db->prepare($sql);
        $statement->bindValue(":idComponent", $id, PDO::PARAM_INT);
        $statement->setFetchMode(PDO::FETCH_CLASS, HistoryComponent::class);
        $statement->execute();
        $history = $statement->fetchAll();
        return $history;
    }

    public function handlePost($postData)
    {
        if (isset($postData['quantity']) || !empty($postData['quantity'])) {
            $this->postIsSubmited = true;
            if (empty($postData['quantity'])) {
                $this->errors[] = "quantity missing";
                $this->postIsValid = false;
            }

        } else {
            $this->postIscomplete = false;
        }
        if (isset($postData['addedRemoved'])) {
            $this->postIsSubmited = true;
            if (empty($postData['addedRemoved'])) {
                $this->errors[] = "action must be selected";
                $this->postIsValid = false;
            }
        } else {
            $this->postIscomplete = false;
        }
    }

    public function modifyStock($postData, $idComponent)
    {
        $quantityPost = intval($postData['quantity']);

        // On recupere la quantité en bdd car la quantité a pu etre modifié depuis le chargement de la page donc $component n'est peut etre plus a jour.
        $componentQantity = $this->getComponentQuantity($idComponent);


        // en bdd addedRemoved est un boll
        // addedRemoved = true =>add
        // addedRemoved = false =>remove

        if ($postData['addedRemoved'] == "add") {

            // cas  ajout  i.e addedremove = true

            // update conposant
            $newQuantity = $quantityPost + $componentQantity;
            $sqlUpdate = 'UPDATE component SET quantity=:quantity WHERE idComponent=:idComponent';
            $statementUpdate = $this->db->prepare($sqlUpdate);
            $statementUpdate->bindValue(":quantity", $newQuantity, PDO::PARAM_INT);
            $statementUpdate->bindValue(":idComponent", $idComponent, PDO::PARAM_INT);
            $statementUpdate->execute();


            // table StockHistory
            $sqlHistory = 'INSERT INTO stockhistory (quantity,addedRemoved,idComponent) VALUES (:quantity,true,:idComponent)';
            $statementHistory = $this->db->prepare($sqlHistory);
            $statementHistory->bindValue(":quantity", $quantityPost, PDO::PARAM_INT);
            $statementHistory->bindValue(":idComponent", $idComponent, PDO::PARAM_INT);
            $statementHistory->execute();

            return true;
        } elseif ($postData['addedRemoved'] == "remove") {


            // cas  retrait  i.e addedremove = false
            if ($quantityPost > $componentQantity) {

                $this->errors[] = "cannot remove more than quantity in stock !";
                return false;
            } else {
                // update conposant

                $newQuantity = $componentQantity - $quantityPost;
                $sqlUpdate = 'UPDATE component SET quantity=:quantity WHERE idComponent=:idComponent';
                $statementUpdate = $this->db->prepare($sqlUpdate);
                $statementUpdate->bindValue(":quantity", $newQuantity, PDO::PARAM_INT);
                $statementUpdate->bindValue(":idComponent", $idComponent, PDO::PARAM_INT);
                $statementUpdate->execute();


                // table StockHistory
                $sqlHistory = 'INSERT INTO stockhistory (quantity,addedRemoved,idComponent) VALUES (:quantity,false,:idComponent)';
                $statementHistory = $this->db->prepare($sqlHistory);
                $statementHistory->bindValue(":quantity", $quantityPost, PDO::PARAM_INT);
                $statementHistory->bindValue(":idComponent", $idComponent, PDO::PARAM_INT);
                $statementHistory->execute();

                return true;
            }

        }
    }
    public function getComponentQuantity($idComponent)
    {
        $sql = "SELECT quantity FROM component WHERE idComponent =:idComponent";
        $statement = $this->db->prepare($sql);
        $statement->bindValue(':idComponent', $idComponent, PDO::PARAM_INT);
        $statement->execute();
        $resut = $statement->fetch();
        return $resut['quantity'];
    }
}