<?php
include_once 'lib\User.php';
//include_once 'lib\Console.php';



require __DIR__ . DIRECTORY_SEPARATOR . 'vendor/autoload.php';
require __DIR__ . DIRECTORY_SEPARATOR . 'lib/Console.php';

$console = new Console(10,20);
$console->nameRequest();
$console->surnameRequest();
$console->createUser();
$console->saveFile();