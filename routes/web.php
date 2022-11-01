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

$router->get('/teachers', 'TeacherController@index');
$router->post('/teachers', 'TeacherController@store');
$router->get('/teachers/{teacher}', 'TeacherController@show');
$router->put('/teachers/{teacher}', 'TeacherController@update');
// $router->patch('/teachers/{teacher}', 'TeacherController@update');
$router->delete('/teachers/{teacher}', 'TeacherController@destroy');