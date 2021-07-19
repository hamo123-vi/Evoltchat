<?php

Flight::route('POST /register', function(){
    Flight::usersService()->register(Flight::request()->data->getData());
    Flight::json(["message" => "Registration successfull!"]);
});

Flight::route('POST /login', function(){
    Flight::json(Flight::usersService()->login(Flight::request()->data->getData()));
});

Flight::route('GET /users',function(){
    Flight::json(Flight::usersService()->loadActiveUsers());
});

Flight::route('PUT /logout', function(){
    Flight::usersService()->logout(Flight::request()->data->getData());
    Flight::json(['message' => 'Doviđenja']);
});