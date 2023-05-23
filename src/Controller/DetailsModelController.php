<?php

namespace Controller;

use Model\Comment;
use PDO;
use Model\User;
use Model\ModelPc;
use Service\ComponentFactory;

class DetailsModelController extends AbstractController
{
    protected bool $postIsSubmitted = false;
    protected bool $postIsValid = true;

    public function getContent(): array
    {

        if (isset($_GET['idModel']) && !empty($_GET['idModel'])) {
            $idModel = $_GET['idModel'];
            $dataComments = $this->getDataComment($idModel);

            if (isset($_POST['message'])) {
                $this->postIsSubmitted = true;
                if (empty($_POST['message'])) {
                    $this->postIsValid = false;
                    $this->errors[] = "message cannot be empty";
                }
            }

            if ($this->postIsSubmitted && $this->postIsValid && isset($_SESSION['user'])) {
                $idUser = $_SESSION['user']->getIdUser();
                $message = $_POST['message'];
                $success = $this->CreateComment($message, $idUser, $idModel);
                if ($success) {
                    header("location: ?page=detailsModel&idModel=" . $idModel);
                }

            }
        }

        // on recupere les donner du model
        $sqlModel = "SELECT * FROM modelpc WHERE idModel=:idModel";
        $statementModel = $this->db->prepare($sqlModel);
        $statementModel->bindValue(":idModel", $idModel, PDO::PARAM_INT);
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

        return ["modelResults" => $modelResults, "components" => $components, "dataComments" => $dataComments];
    }
    public function getFileName(): string
    {
        return "detailsModel";
    }
    public function getPageTitle(): string
    {
        return "Détails d'un Model";
    }

    public function getComment(int $idModel)
    {
        $sqlComment = 'SELECT * FROM  comment
        WHERE idModel =:idModel ORDER BY commentDate DESC';
        $statement = $this->db->prepare($sqlComment);
        $statement->bindValue(":idModel", $idModel, PDO::PARAM_INT);
        $statement->setFetchMode(PDO::FETCH_CLASS, Comment::class);
        $statement->execute();
        $comments = $statement->fetchAll();
        return $comments;
    }
    public function getDataComment(int $idModel)
    {
        $comments = $this->getComment($idModel);
        $dataComments = [];
        foreach ($comments as $comment) {
            $sqlUser = 'SELECT Users.* FROM Users
            INNER JOIN comment on Users.idUser =comment.idUser
            WHERE comment.idComment =:idComment';
            $statement = $this->db->prepare($sqlUser);
            $statement->bindValue(":idComment", $comment->getIdComment(), PDO::PARAM_INT);
            $statement->setFetchMode(PDO::FETCH_CLASS, User::class);
            $statement->execute();

            while ($user = $statement->fetch()) {
                $dataComments[] = ['comment' => $comment, 'user' => $user];
            }
        }
        return $dataComments;
    }
    public function CreateComment(string $message, int $idUser, int $idModel)
    {
        $sqlComment = "INSERT INTO comment (message,idModel,idUser) VALUES (:message,:idModel,:idUser)";

        $statement = $this->db->prepare($sqlComment);
        $statement->bindValue(":message", $message, PDO::PARAM_STR);
        $statement->bindValue(":idUser", $idUser, PDO::PARAM_INT);
        $statement->bindValue(":idModel", $idModel, PDO::PARAM_INT);
        $success = $statement->execute();
        return $success;

    }
}