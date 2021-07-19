<?php

Flight::route('POST /send', function(){
    Flight::messagesService()->sendMessage(Flight::request()->data->getData());
    Flight::json(["message" => "Message sent!"]);
});

Flight::route('GET /messages',function(){
    Flight::json(Flight::messagesService()->loadMessages());
});