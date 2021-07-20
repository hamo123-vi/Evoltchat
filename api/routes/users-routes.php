<?php

Flight::route('POST /register', function(){
    Flight::json(Flight::usersService()->register(Flight::request()->data->getData()));
});

Flight::route('POST /login', function(){
    Flight::json(Flight::usersService()->login(Flight::request()->data->getData()));
});

Flight::route('GET /users',function(){
    Flight::json(Flight::usersService()->loadActiveUsers());
});

Flight::route('POST /logout', function(){
    Flight::usersService()->logout(Flight::request()->data->getData());
    Flight::json(['message' => 'Doviđenja']);
});