<?php

#Import FlightPHP modules
require dirname(__FILE__).'/../vendor/autoload.php';


#Import Services layer
require_once dirname(__FILE__)."/services/UsersService.class.php";
require_once dirname(__FILE__)."/services/MessagesService.class.php";;

#Registering Service layer
Flight::register('userService', 'UserService');
Flight::register('messagesService', 'MessagesService');

#Mapping 'query' function
Flight::map('query', function($name, $default_value){
    $request=Flight::request();
    $query_param=@$request->data->getData()[$name];
    $query_param = $query_param ? $query_param : $default_value;
    return $query_param;
});
  
#Import Routes layer
require_once dirname(__FILE__)."/routes/users-routes.php";
require_once dirname(__FILE__)."/routes/messages_routes.php";

Flight::start();