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

        if (isset($_SESSION['user']) && ($_SESSION['user']->getRole() == "concepteur")) {
            $pageName = "concepteur";
        } elseif (isset($_SESSION['user']) && ($_SESSION['user']->getRole() == "monteur")) {
            $pageName = "monteur";
        } elseif (isset($_SESSION['user']) && ($_SESSION['user']->getRole() == "admin")) {
            $pageName = "backOffice";
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

	public function getPages(): array {
		return $this->pages;
	}
}