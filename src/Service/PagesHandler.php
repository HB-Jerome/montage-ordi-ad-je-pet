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
        $page = 'home';
        if (!empty($getData['page'])) {
            $page = $getData['page'];
        }

        foreach ($this->pages as $currentPage) {
            if ($currentPage->getFileName() == $page) {
                return $currentPage;
            }
        }

        return null;
    }
}