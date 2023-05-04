<?php
namespace Controller;

class LogoutController extends AbstractController {

    public function getContent(): array
    {

        return [];
    }

    public function getFileName(): string
    {
        return 'logout';
    }

    public function getPageTitle(): string
    {
        return 'Logged out';
    }
}
?>