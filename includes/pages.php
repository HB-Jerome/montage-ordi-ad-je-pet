<?php
use Controller\ConcepteurController;
use Controller\HomeController;
use Controller\LoginController;
use Controller\LogoutController;
use Controller\MonteurController;
use Controller\ModelController;
use Model\Page;
use Service\PagesHandler;
use Controller\ListPieceController;


$pagesHandler = new PagesHandler([
    new Page('home', HomeController::class),
    new Page('login', LoginController::class),
    new Page('logout', LogoutController::class),
    new Page('concepteur', ConcepteurController::class),
    new Page('monteur', MonteurController::class),
<<<<<<< HEAD
    new Page('test', TestController::class),
    new Page('listPiece', ListPieceController::class),
=======
    new Page('model', ModelController::class)
>>>>>>> 2c89e23 (v0.1)
]);