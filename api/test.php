<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);


require_once dirname(__FILE__)."/services/UsersService.Class.php";
$us = new UsersService();
$result = $us->loadActiveUsers();
print_r($result);

