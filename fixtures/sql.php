<?php
spl_autoload_register(function ($class) {
    require_once "../src/$class.php";
});
include "../includes/config.inc.php";

include_once "graphicCard.php";
include_once "hardDisc.php";
include_once "keyboard.php";
include_once "motherBoard.php";
include_once "mouseAndPad.php";
include_once "powerSupply.php";
include_once "processor.php";
include_once "ram.php";
include_once "screen.php";
include_once "user.php";