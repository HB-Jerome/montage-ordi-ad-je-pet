<?php

namespace Controller;

use Model\User;
use Model\Login;
use PDO;

class LoginController extends AbstractController
{
    public function getContent(): array
    {
        $login = new login($_POST);

        if ($login->isValid()) {
            $sql = 'SELECT * FROM users WHERE username=:username AND password=:password';
            $statement = $this->db->prepare($sql);
            $statement->bindValue(':username', $login->getUsername(), PDO::PARAM_STR);
            $statement->bindValue(':password', $login->getPassword(), PDO::PARAM_STR);
            $statement->setFetchMode(PDO::FETCH_CLASS, User::class);

            $statement->execute();
            $user = $statement->fetch();
            if (empty($user)) {
                $login->addError("L'utilisateur ou le mot de passe est incorrect");
            } else {
                $user->saveSession();
                // header("Location: ?page=home&action=success");
            }


        }


        return ['login' => $login];
    }

    public function getFileName(): string
    {
        return 'login';
    }

    public function getPageTitle(): string
    {
        return 'Connexion';
    }
}