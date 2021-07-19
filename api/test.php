<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);


require_once dirname(__FILE__)."/dao/MessagesDao.Class.php";
$msgdao = new MessagesDao();
$result = $msgdao->getMessages();
print_r($result);