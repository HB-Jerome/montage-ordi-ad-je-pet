<?php
use Controller\HomeController;
use Controller\LoginController;
use Controller\LogoutController;
use Model\Page;
use Service\PagesHandler;


$pagesHandler = new PagesHandler([
    new Page('home', HomeController::class),
    new Page('login', LoginController::class),
    new Page('logout', LogoutController::class),
]);