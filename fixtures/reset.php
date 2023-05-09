<?php
spl_autoload_register(function ($class) {
    require_once "../src/$class.php";
});
include "../includes/config.inc.php";


$montage_ordi = '../montage_ordi.sql';
$sqlReset = file_get_contents($montage_ordi);

$intiDb = $db->exec($sqlReset);