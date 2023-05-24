<?php

use Model\User;


$Users = [
    (new User())
        ->setPassword("1234")
        ->setRole(User::CONCEPTEUR)
        ->setUsername('Adel'),
    (new User())
        ->setPassword("007")
        ->setRole(User::MONTEUR)
        ->setUsername('toto'),
    (new User())
        ->setPassword("1234")
        ->setRole(User::CONCEPTEUR)
        ->setUsername('Peter'),
    (new User())
        ->setPassword("1234")
        ->setRole(User::MONTEUR)
        ->setUsername('Jerome'),
    (new User())
        ->setPassword("007")
        ->setRole(User::MONTEUR)
        ->setUsername('TatyJosy'),
    (new User())
        ->setPassword("666")
        ->setRole(User::ADMIN)
        ->setUsername('GodComplex'),
];

$sql = 'INSERT INTO Users (username,password,role) VALUES (:username,:password,:role)';

$statement = $db->prepare($sql);


foreach ($Users as $user) {
    $statement->bindValue(':username', $user->getUsername(), PDO::PARAM_STR);
    $statement->bindValue(':password', $user->getPassword(), PDO::PARAM_STR);
    $statement->bindValue(':role', $user->getRole(), PDO::PARAM_STR);

    $statement->execute();
}