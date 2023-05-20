<?php

namespace Controller;

use Model\Page;
use PDO;

abstract class AbstractController
{
    protected PDO $db;
    protected Page $page;
    protected ?array $errors = [];

    public function __construct(PDO $db, Page $page)
    {
        $this->page = $page;
        $this->db = $db;
    }

    public function render()
    {
        ob_start();

        require_once 'includes/functions.php';

        $pageTitle = $this->getPageTitle();

        include_once 'src/View/layout/header.php';

        $viewParams = $this->getContent();
        extract($viewParams);
        include_once 'src/View/' . $this->getFileName() . '.php';

        include_once 'src/View/layout/footer.php';

        echo ob_get_clean();
    }

    abstract public function getContent(): array;

    abstract public function getFileName(): string;

    abstract public function getPageTitle(): string;
}