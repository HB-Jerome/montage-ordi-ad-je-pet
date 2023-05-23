<?php

namespace Controller;

use Model\User;
use Model\Login;
use PDO;

class LoginController extends AbstractController
{
    public function getContent(): array
    {
        $login = new Login($_POST);

        if ($login->isValid() && $login->isSubmited()) {
            $sql = 'SELECT * FROM users WHERE username=:username';
            $statement = $this->db->prepare($sql);
            $statement->bindValue(':username', $login->getUsername(), PDO::PARAM_STR);
            $statement->setFetchMode(PDO::FETCH_CLASS, User::class);

            $statement->execute();
            $user = $statement->fetch();
            var_dump($user);
            if (empty($user)) {
                $login->addError("L'utilisateur n'existe pas !");
            } else {
                if (password_verify($login->getPassword(), $user->getPassword())) {
                    $user->saveSession();
                    header("Location: ?");
                } else {
                    $login->addError("L'utilisateur et le mot de passe ne correspondent pas !");
                }
            }
        }


        return ['login' => $login, "errors" => $this->errors];
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