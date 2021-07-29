<?php

/**
 * @OA\Post(path="/user/send", tags={"User"}, security={{"ApiKeyAuth": {}}},
 * @OA\RequestBody(
    * description="Send message to global channel",
    * required=true,
        * @OA\MediaType(mediaType="application/json",
            * @OA\Schema(
                * @OA\Property(property="body", type="string", example="Hello World", description="Type in message body"),
                * @OA\Property(property="user_id", type="integer", example="", description="Type in sender id") ) ) ),
 * @OA\Response(response="200", description="Login")
 * )
 *  
 */
Flight::route('POST /user/send', function(){
    Flight::messagesService()->sendMessage(Flight::request()->data->getData());
    Flight::json(["message" => "Message sent!"]);
});

/**
 * @OA\Get(
 *     path="/user/messages", tags={"User"}, security={{"ApiKeyAuth": {}}},
 *     @OA\Response(response="200", description="Get global messages from database")
 * )
 */
Flight::route('GET /user/messages',function(){
    Flight::json(Flight::messagesService()->loadMessages());
});