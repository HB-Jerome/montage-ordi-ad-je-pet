<?php
use Controller\ConcepteurController;
use Controller\HomeController;
use Controller\LoginController;
use Controller\LogoutController;
use Controller\MonteurController;
use Controller\ModelCreationController;
use Model\Page;
use Service\PagesHandler;
use Controller\ListPieceController;


$pagesHandler = new PagesHandler([
    new Page('home', HomeController::class),
    new Page('login', LoginController::class),
    new Page('logout', LogoutController::class),
    new Page('concepteur', ConcepteurController::class),
    new Page('monteur', MonteurController::class),
    new Page('listPiece', ListPieceController::class),
    new Page('model', ModelController::class),
    new Page('modelCreation', ModelCreationController::class),
]);