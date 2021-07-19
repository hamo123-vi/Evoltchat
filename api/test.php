<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);


require_once dirname(__FILE__)."/dao/UsersDao.Class.php";
$usersdao = new UsersDao();
$result = $usersdao->updateActivity("test003", ['active' => 0]);