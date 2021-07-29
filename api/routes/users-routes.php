<?php

/* Swagger documentation */
/**
 * @OA\Info(title="Evoltchat API", version="0.1"),
 * @OA\OpenApi(
 *    @OA\Server(url="http://localhost/Evoltchat/api/", description="Development Environment" )
 * ),
 * @OA\SecurityScheme(
 *      securityScheme="ApiKeyAuth",
 *      in="header",
 *      name="Authorization",
 *      type="apiKey"
 * ),
 */

/**
 * @OA\Post(path="/register", tags={"Public"},
 * @OA\RequestBody(
    * description="Main user info",
    * required=true,
        * @OA\MediaType(mediaType="application/json",
            * @OA\Schema(
                * @OA\Property(property="password", type="string", example="", description="Type in password") ) ) ),
 * @OA\Response(response="200", description="Register")
 * )
 *  
 */
Flight::route('POST /register', function(){
    Flight::json(Flight::usersService()->register(Flight::request()->data->getData()));
});

/**
 * @OA\Post(path="/login", tags={"Public"},
 * @OA\RequestBody(
    * description="Type in login data",
    * required=true,
        * @OA\MediaType(mediaType="application/json",
            * @OA\Schema(
                * @OA\Property(property="username", type="string", example="user_******", description="Type in username"),
                * @OA\Property(property="password", type="string", example="", description="Type in password") ) ) ),
 * @OA\Response(response="200", description="Login")
 * )
 *  
 */
Flight::route('POST /login', function(){
    Flight::json(Flight::usersService()->login(Flight::request()->data->getData()));
});

/**
 * @OA\Get(
 *     path="/user/users", tags={"User"}, security={{"ApiKeyAuth": {}}},
 *     @OA\Response(response="200", description="Get active users from database")
 * )
 */
Flight::route('GET /user/users',function(){
    Flight::json(Flight::usersService()->loadActiveUsers());
});

/**
 * @OA\Post(path="/user/logout", tags={"User"}, security={{"ApiKeyAuth": {}}},
 * @OA\RequestBody(
    * description="Log out data",
    * required=true,
        * @OA\MediaType(mediaType="application/json",
            * @OA\Schema(
                * @OA\Property(property="username", type="string", example="user_******", description="Type in username") ) ) ),
 * @OA\Response(response="200", description="Logout")
 * )
 *  
 */
Flight::route('POST /user/logout', function(){
    Flight::usersService()->logout(Flight::request()->data->getData());
    Flight::json(['message' => 'Doviđenja']);
});