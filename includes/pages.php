<?php
use Controller\HomeController;
use Controller\LoginController;
use Model\Page;
use Service\PagesHandler;


$pagesHandler = new PagesHandler([
    new Page('home', HomeController::class),
    new Page('login', LoginController::class),
]);