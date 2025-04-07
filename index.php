<?php
require_once "./Database.php";
require_once "./vendor/autoload.php";

use Matthieuthuetdev\MySQLToolBox\MySQLToolBox;

$tool = new MySQLToolBox(Database::getInstance());
var_dump($tool->exportDatabase());