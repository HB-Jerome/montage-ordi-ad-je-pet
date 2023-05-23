<?php
include 'includes/autoload.php';
include 'includes/pages.php';
include 'includes/config.inc.php';


session_start();

$page = $pagesHandler->getCurrent($_GET);

$controller = $page->getController();

$current = new $controller($db, $page);

$current->secureAcces();
$current->render();