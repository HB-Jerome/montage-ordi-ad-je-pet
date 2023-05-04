<?php
use Controller\HomeController;
use Controller\LoginController;
use Controller\LogoutController;
use Controller\ConcepteurController;
use Controller\MonteurController;
use Model\Page;
use Service\PagesHandler;


$pagesHandler = new PagesHandler([
    new Page('home', HomeController::class),
    new Page('login', LoginController::class),
    new Page('logout', LogoutController::class),
    new Page('concepteur', ConcepteurController::class),
    new Page('monteur', MonteurController::class),
    new Page('test', TestController::class)
]);