<?php
namespace Controller;

use PDO;


class DeleteArchiveController extends AbstractController
{
    public function getContent(): array
    {// On va chercher dans la table intermédiaire si idComponent est lié à un modèle
        if (isset($_GET['idComponent'])){
            $id=$_GET['idComponent'];
            $sql='SELECT * FROM modelpc_component WHERE idComponent=:idComponent';
            $statement=$this->db->prepare($sql);
            $statement->bindValue(':idComponent',$id,PDO::PARAM_INT);
            $statement->execute();
            $result=$statement->fetch();
            
            // Je récupère dans une variable $sqlQuantity la quantité en stock du composant
            $sqlQuantity='SELECT quantity FROM component WHERE idComponent=:idComponent';
            $statement=$this->db->prepare($sqlQuantity);
            $statement->bindValue(':idComponent',$id,PDO::PARAM_INT);
            $statement->execute();

            $resultQuantity=$statement->fetch();
            $quantity=$resultQuantity['quantity'];
            var_dump($resultQuantity);
            var_dump($result);
            var_dump(empty($result));
            if (empty($result)&&$quantity==0){
                
                $sqlDelete="DELETE  GraphicCard ,HardDisc,Keyboard,MotherBoard,MouseAndPad,PowerSupply,Processor,Ram,Screen
                FROM component
                            LEFT JOIN GraphicCard on component.idComponent =GraphicCard.idComponent
                            LEFT JOIN HardDisc on component.idComponent =HardDisc.idComponent
                            LEFT JOIN Keyboard on component.idComponent =Keyboard.idComponent
                            LEFT JOIN MotherBoard  on component.idComponent =MotherBoard.idComponent
                            LEFT JOIN MouseAndPad  on component.idComponent =MouseAndPad.idComponent
                            LEFT JOIN PowerSupply  on component.idComponent =PowerSupply.idComponent
                            LEFT JOIN Processor  on component.idComponent =Processor.idComponent
                            LEFT JOIN Ram  on component.idComponent =Ram.idComponent
                            LEFT JOIN Screen on component.idComponent = Screen.idComponent
                WHERE component.idComponent =:idComponent;
                
                DELETE FROM component WHERE component.idComponent =:idComponent;
                ";
                $statement = $this->db->prepare($sqlDelete);
                $statement->bindValue(':idComponent', $id, PDO::PARAM_INT);
                $statement->execute();
            } 
            else {
                $sqlUpdate='UPDATE component SET isArchived=:isArchived WHERE idComponent=:idComponent';
                $statement=$this->db->prepare($sqlUpdate);
                $statement->bindValue(':isArchived',true,PDO::PARAM_BOOL);
                $statement->bindValue(':idComponent',$id,PDO::PARAM_INT);
                $statement->execute();

            }
        }
        return [];
    }

    public function getFileName(): string
    {
        return 'deletearchive';
    }

    public function getPageTitle(): string
    {
        return 'Suppression ou archivage d\'une pièce ';
    }
}