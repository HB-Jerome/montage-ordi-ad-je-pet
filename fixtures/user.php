<?php
spl_autoload_register(function ($class) {
    require_once "../src/$class.php";
});
include "../includes/config.inc.php";
use Model\User;


$Users = [
    (new User())
        ->setPassword("1234")
        ->setRole('Concepteur')
        ->setUsername('Adel'),
    (new User())
        ->setPassword("1234")
        ->setRole('Concepteur')
        ->setUsername('Peter'),
    (new User())
        ->setPassword("1234")
        ->setRole('concepteur')
        ->setUsername('Jerome'),
    (new User())
        ->setPassword("007")
        ->setRole('monteur')
        ->setUsername('toto'),
];

$sql = 'INSERT INTO users (username,password,role) VALUES (:username,:password,:role)';

$statement = $db->prepare($sql);


foreach ($Users as $user) {
    $statement->bindValue(':username', $user->getUsername(), PDO::PARAM_STR);
    $statement->bindValue(':password', $user->getPassword(), PDO::PARAM_STR);
    $statement->bindValue(':role', $user->getRole(), PDO::PARAM_STR);

    $statement->execute();
}