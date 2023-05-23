<?php

namespace Controller;

use Model\User;
use Model\Page;
use PDO;

abstract class AbstractController
{
    protected PDO $db;
    protected Page $page;
    protected ?array $errors = [];


    const CODE_403 = 403;

    const ERRORS_CODE = [
        self::CODE_403 => "Acces denied : vous n'avez pas acces a cette partie du site !",
    ];

    public function __construct(PDO $db, Page $page)
    {
        $this->page = $page;
        $this->db = $db;
        if (isset($_GET['error'])) {
            $code = $_GET['error'];
            $this->errors[] = self::ERRORS_CODE[$code];
        }
    }
    public function secureAcces()
    {
        if ($this->page->getController() != LoginController::class)
            if (isset($_SESSION['user'])) {
                $role = $_SESSION['user']->getRole();
                if ($role == User::ADMIN) {
                    return true;
                }
                if (!in_array($role, $this->page->getRoleAlowed())) {
                    $code = self::CODE_403;
                    header('location: ?page=login&error=' . $code);
                } else {
                    return true;
                }
            } else {
                header('location: ?page=login');
            }
    }

    public function render()
    {
        ob_start();

        require_once 'includes/functions.php';


        $pageTitle = $this->getPageTitle();
        $viewParams = $this->getContent();
        extract($viewParams);
        include_once 'src/View/layout/header.php';


        include_once 'src/View/' . $this->getFileName() . '.php';

        include_once 'src/View/layout/footer.php';

        echo ob_get_clean();
    }

    abstract public function getContent(): array;

    abstract public function getFileName(): string;

    abstract public function getPageTitle(): string;
}