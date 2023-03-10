<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('/clients/store', [ClientController::class, 'store']);

Route::get('/clients/show/{client}', [ClientController::class, 'getClient']);

Route::get('/clients/name/{name}', [ClientController::class, 'getClientByName']);

Route::get('/clients/search/{text}', [ClientController::class, 'searchClient']);

Route::get('/clients/bills/{client}', [ClientController::class, 'getBills']);

Route::get('/bills/expensive/{value}', [ClientController::class, 'getByValue']);

Route::get('/bills/between/{value1}/{value2}', [ClientController::class, 'betweenValues']);

Route::get('/clients/order', [ClientController::class, 'orderClients']);
