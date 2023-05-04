<?php
include 'includes/autoload.php';
include 'includes/pages.php';
include 'includes/config.inc.php';
var_dump($_SESSION);
if (isset($_SESSION['user'])) {
    var_dump($_SESSION['user']->getRole());
}

$page = $pagesHandler->getCurrent($_GET);
var_dump("page" . $page->getController());
$controller = $page->getController();

$current = new $controller($db, $page);
$current->render();