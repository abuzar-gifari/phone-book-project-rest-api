<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->post('/registration','RegistrationController@OnRegister');

$router->post('/login','LoginController@OnLogin');

// $router->post('/tokenTest',['middleware'=>'auth','uses'=>'LoginController@TokenTest']);
$router->post('/insert',['middleware'=>'auth','uses'=>'PhoneBookController@OnInsert']);
$router->post('/select',['middleware'=>'auth','uses'=>'PhoneBookController@OnSelect']);
$router->post('/delete',['middleware'=>'auth','uses'=>'PhoneBookController@OnDelete']);


