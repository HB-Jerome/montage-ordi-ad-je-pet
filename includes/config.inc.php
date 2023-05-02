<?php
$dsn = 'mysql:dbname=montage_ordi;port=3306;host=127.0.0.1';
$user = 'root'; // Utilisateur par défaut
$password = ''; // Par défaut, pas de mot de passe sur Wamp

// Try nous permet d'attraper une exception
try {
    // On crée une connexion (objet PDO) à norte BdD
    $db = new PDO($dsn, $user, $password, [
            // Définition du mode d'erreur : on renvoie une exception es
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            // On définit sous quel format on récupère les données de la base
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
} catch (PDOException $e) {
    exit('Connexion échouée : ' . $e->getMessage());
}