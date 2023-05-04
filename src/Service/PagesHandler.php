<?php

namespace Service;

use Model\Page;

class PagesHandler
{
    protected array $pages;


    public function __construct(array $pages)
    {
        $this->pages = $pages;
    }

    public function getCurrent(array $getData): ?Page
    {
        $currentPage = null;
        $pageName = null;
        // Cas variables $_GET existe
        if (!empty($getData['page'])) {
            $pageName = $getData['page'];
            foreach ($this->pages as $pageObject) {
                if ($pageObject->getFileName() == $pageName) {
                    return $currentPage = $pageObject;
                }
            }
            // si le foreach se ternmine sans trouver la page  $currentPage est toujour NULL
        }
        // Cas variables get n'existe pas

        if (isset($_SESSION['user']) && ($_SESSION['user']->getRole() == "Concepteur")) {
            $pageName = "concepteur";
        } elseif (isset($_SESSION['user']) && ($_SESSION['user']->getRole() == "monteur")) {
            $pageName = "monteur";
        } else {
            // cas default 
            $pageName = "login";
        }
        // on recupere l'objet page grace a pageName 
        foreach ($this->pages as $pageObject) {
            if ($pageObject->getFileName() == $pageName) {

                $currentPage = $pageObject;
                return $currentPage;
            }
        }
    }
}