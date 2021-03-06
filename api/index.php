<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, PUT, POST');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

#Import FlightPHP modules
require dirname(__FILE__).'/../vendor/autoload.php';

#Import Services layer
require_once dirname(__FILE__)."/services/UsersService.class.php";
require_once dirname(__FILE__)."/services/MessagesService.class.php";;

#Registering Service layer
Flight::register('usersService', 'UsersService');
Flight::register('messagesService', 'MessagesService');

#Swagger documentation
Flight::route('GET /swagger', function(){
    $openapi = @\OpenApi\scan(dirname(__FILE__)."/routes");
    header('Content-Type: application/json');
    echo $openapi->toJson();
  });
  
  Flight::route('GET /', function(){
    Flight::redirect('/docs');
  });
  
#Import Routes layer
require_once dirname(__FILE__)."/routes/users-routes.php";
require_once dirname(__FILE__)."/routes/messages-routes.php";

Flight::start();