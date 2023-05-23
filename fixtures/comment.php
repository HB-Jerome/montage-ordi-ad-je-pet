<?php

use Model\Comment;

// on obtient des idModel

$sqlIdModel = "SELECT idModel FROM modelpc LIMIT 3";
$statement = $db->prepare($sqlIdModel);
$statement->execute();
$idModels = $statement->fetchAll();


// on obtient des idUser
$sqlIdUser = "SELECT idUser FROM users LIMIT 4";
$statement = $db->prepare($sqlIdUser);
$statement->execute();
$idUsers = $statement->fetchAll();



$message1 = "message 1 :coucou ceci est un message";
$message2 = "message 2: Genial ton message très original";
$message3 = "message 3: J'ai pas d'inspiration";
$message4 = "message 4: Est-ce que tout les message vont se ressembler ?";


foreach ($idModels as $idModel) {

    $comments = [
        (new Comment())

            // propriètés message
            ->setIdModel($idModel['idModel'])
            ->setMessage($message1)
            ->setIdUser($idUsers[0]['idUser'])
            ->setMessageSeen(false),

        (new Comment())

            // propriètés message
            ->setIdModel($idModel['idModel'])
            ->setIdUser($idUsers[1]['idUser'])
            ->setMessage($message2)
            ->setMessageSeen(false),
        (new Comment())

            // propriètés message
            ->setIdModel($idModel['idModel'])
            ->setIdUser($idUsers[2]['idUser'])
            ->setMessage($message3)
            ->setMessageSeen(false),
        (new Comment())

            // propriètés message
            ->setIdModel($idModel['idModel'])
            ->setIdUser($idUsers[3]['idUser'])
            ->setMessage($message4)
            ->setMessageSeen(false),
    ];

    foreach ($comments as $comment) {
        $sqlComment = "INSERT INTO Comment (idModel,idUser,message,messageSeen) VALUES (:idModel,:idUser,:message,:messageSeen)";
        $statementComment = $db->prepare($sqlComment);
        $statementComment->bindValue(":idModel", $comment->getIdModel());
        $statementComment->bindValue(":idUser", $comment->getIdUser());
        $statementComment->bindValue(":message", $comment->getMessage());
        $statementComment->bindValue(":messageSeen", $comment->getMessageSeen());
        $statementComment->execute();
    }


}