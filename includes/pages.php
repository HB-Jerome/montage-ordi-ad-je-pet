<?php

use Model\User;

use Controller\ConcepteurController;
use Controller\HomeController;
use Controller\LoginController;
use Controller\LogoutController;
use Controller\MonteurController;
use Controller\ModelCreationController;
use Controller\UpdateModelController;
use Controller\ModificationPieceController;
use Model\Page;
use Service\PagesHandler;
use Controller\ListPieceController;
use Controller\ListModelController;
use Controller\DetailsProduitController;
use Controller\DeleteArchiveController;
use Controller\GestionStockController;
use Controller\CreationComponentController;
use Controller\DetailsModelController;

use Controller\BackOfficeController;


$pagesHandler = new PagesHandler([
    new Page('backOffice', BackOfficeController::class, []),
    new Page('home', HomeController::class, []),
    new Page('login', LoginController::class, []),
    new Page('logout', LogoutController::class, []),
    new Page(
        'concepteur', ConcepteurController::class,
        [User::CONCEPTEUR]
    ),
    new Page(
        'monteur', MonteurController::class,
        [User::MONTEUR]
    ),
    new Page(
        'modelCreation', ModelCreationController::class,
        [User::CONCEPTEUR]
    ),
    new Page(
        'modificationPiece', ModificationPieceController::class,
        [User::CONCEPTEUR]
    ),
    new Page(
        'listPiece', ListPieceController::class,
        [User::MONTEUR, User::CONCEPTEUR]
    ),
    new Page(
        'listModel', ListModelController::class,
        [User::MONTEUR, User::CONCEPTEUR]
    ),
    new Page(
        'detailsProduit', DetailsProduitController::class,
        [User::MONTEUR, User::CONCEPTEUR]
    ),
    new Page(
        'updateModel', UpdateModelController::class,
        [User::CONCEPTEUR]
    ),
    new Page('deletearchive', DeleteArchiveController::class, [User::CONCEPTEUR]),
    new Page('gestionStock', GestionStockController::class, [User::CONCEPTEUR]),
    new Page('detailsModel', DetailsModelController::class, [User::MONTEUR, User::CONCEPTEUR]),
    new Page('creationComponent', CreationComponentController::class, [User::CONCEPTEUR]),
]);