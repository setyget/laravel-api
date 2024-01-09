<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/clients', 'App\Http\Controllers\ClientController@index');
Route::post('/clients', 'App\Http\Controllers\ClientController@store');
Route::get('/clients/{client}', 'App\Http\Controllers\ClientController@show');
Route::put('/clients/{client}', 'App\Http\Controllers\ClientController@update');
Route::delete('/clients/{client}', 'App\Http\Controllers\ClientController@destroy');

Route::get('/groups', 'App\Http\Controllers\GroupController@index');
Route::post('/groups', 'App\Http\Controllers\GroupController@store');
Route::get('/groups/{group}', 'App\Http\Controllers\GroupController@show');
Route::put('/groups/{group}', 'App\Http\Controllers\GroupController@update');
Route::delete('/groups/{group}', 'App\Http\Controllers\GroupController@destroy');

Route::post('/clients/group', 'App\Http\Controllers\ClientController@attach');
//Ruta para mostrar todos los grupos de un cliente
Route::get('/clients/groups/{client}', 'App\Http\Controllers\ClientController@displayClientGroups');
//Ruta para mostrar todos los clientes con sus grupos
Route::get('/clientgroups', 'App\Http\Controllers\ClientController@clientAndGroups');
//Ruta para eliminar un grupo de un cliente
Route::post('/clients/groups/detach', 'App\Http\Controllers\ClientController@detach');

//Ruta para saber cuantos clientes tiene un grupo
Route::post('/groups/clients', 'App\Http\Controllers\GroupController@clientList');
