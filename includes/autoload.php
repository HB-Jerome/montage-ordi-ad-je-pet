<?php
// chargement des classes avec un autoloader
spl_autoload_register(function ($class) {
    require_once "src/$class.php";
});