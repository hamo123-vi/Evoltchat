<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);


require_once dirname(__FILE__)."/services/MessagesService.Class.php";
$us = new MessagesService();
$result = $us->loadMessages();
print_r($result);

