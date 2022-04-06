<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/main','App\Http\Controllers\MainController@index');
Route::post('/main/checklogin', 'App\Http\Controllers\MainController@checklogin');
Route::get('main/successlogin', 'App\Http\Controllers\MainController@successlogin');
Route::get('main/logout', 'App\Http\Controllers\MainController@logout');
Route::get('/start', 'App\Http\Controllers\OrderController@start');
Route::get('/ship', 'App\Http\Controllers\OrderController@ship');
Route::get('/complete', 'App\Http\Controllers\OrderController@complete');
Route::get('/forgot', 'App\Http\Controllers\OrderController@index');
Route::post('/change', 'App\Http\Controllers\OrderController@change');
//Profile
Route::get('/changePassword', 'App\Http\Controllers\ProfileController@changePassPage');
Route::get('/changeMail', 'App\Http\Controllers\ProfileController@changeMailPage');
Route::get('/changeName', 'App\Http\Controllers\ProfileController@changeNamePage');
Route::post('/changepass', 'App\Http\Controllers\ProfileController@changepass');
Route::post('/changename', 'App\Http\Controllers\ProfileController@changename');
Route::post('/changemail', 'App\Http\Controllers\ProfileController@changemail');

//liste de stock
Route::get('/listStock', 'App\Http\Controllers\StockController@listStockPage');
Route::get('/addProduct', 'App\Http\Controllers\StockController@addProductPage');
Route::post('/addProductForm', 'App\Http\Controllers\StockController@addProduct');
Route::get('/deleteP/{id}', 'App\Http\Controllers\StockController@delete');
Route::get('/editProduct/{id}', 'App\Http\Controllers\StockController@showData');
Route::post('/editProduct', 'App\Http\Controllers\StockController@update');
Route::get('/pdts', 'App\Http\Controllers\StockController@getPdts');
Route::get('/listpdts', 'App\Http\Controllers\StockController@downloadListStock');
Route::get('/pdtPictures/{id}', 'App\Http\Controllers\StockController@showPics');
Route::post('/uploadImg', 'App\Http\Controllers\StockController@uploadImg');
Route::get('/deletePIC/{id}', 'App\Http\Controllers\StockController@deletePIC');

//fiche de stock
Route::get('/ficheStock', 'App\Http\Controllers\StockController@ficheStockPage');
Route::get('/addMovPageEntree/{id}', 'App\Http\Controllers\StockController@addMovPageEntree');
Route::get('/addMovPageSortie/{id}', 'App\Http\Controllers\StockController@addMovPageSortie');
Route::post('/addMovPageEntree', 'App\Http\Controllers\StockController@addMovEntree');
Route::post('/addMovPageSortie', 'App\Http\Controllers\StockController@addMovSortie');
Route::get('/listMov/{id}', 'App\Http\Controllers\StockController@listMov');
Route::get('/deleteMOV/{id}', 'App\Http\Controllers\StockController@deleteMOV');

//alerte stock
Route::get('/alertStock', 'App\Http\Controllers\StockController@alertStock');
Route::get('/alert', 'App\Http\Controllers\StockController@getAlert');
Route::get('/listAlert', 'App\Http\Controllers\StockController@downloadListAlert');

//liste des clients
Route::get('/listClient', 'App\Http\Controllers\ClientController@listClient');
Route::get('/addClient', 'App\Http\Controllers\ClientController@addClientPage');
Route::post('/addClientForm', 'App\Http\Controllers\ClientController@addclient');
Route::get('/delete/{id}', 'App\Http\Controllers\ClientController@delete');
Route::get('/editClient/{id}', 'App\Http\Controllers\ClientController@showData');
Route::post('/editClient', 'App\Http\Controllers\ClientController@update');

//livraison liste des BL
Route::get('/listBL', 'App\Http\Controllers\ClientController@listBL');
Route::get('/addBL', 'App\Http\Controllers\ClientController@addBLPage');
Route::post('/addBLForm', 'App\Http\Controllers\ClientController@addBL');
Route::get('/deleteBL/{id}', 'App\Http\Controllers\ClientController@deleteBL');
Route::get('/editBL/{id}', 'App\Http\Controllers\ClientController@showDataBL');
Route::post('/editBL', 'App\Http\Controllers\ClientController@updateBL');
Route::get('/detailsBL/{id}', 'App\Http\Controllers\ClientController@detailsBL');
Route::get('/addDetailsBL/{id}', 'App\Http\Controllers\ClientController@getAddDetailsBL');
Route::post('/addDetailsBLForm', 'App\Http\Controllers\ClientController@addDetailsBLForm');
Route::get('/deletedetailsBL/{id}', 'App\Http\Controllers\ClientController@deletedetailsBL');
Route::get('/printBL/{id}', 'App\Http\Controllers\ClientController@printBL');

//Bon d'avoir des clients
Route::get('/avoirClt', 'App\Http\Controllers\ClientController@avoirClt');
Route::get('/addBA', 'App\Http\Controllers\ClientController@addBAPage');
Route::post('/addBAForm', 'App\Http\Controllers\ClientController@addBA');
Route::get('/deleteBA/{id}', 'App\Http\Controllers\ClientController@deleteBA');
Route::get('/editBA/{id}', 'App\Http\Controllers\ClientController@showDataBA');
Route::post('/editBA', 'App\Http\Controllers\ClientController@updateBA');
Route::get('/detailsBA/{id}', 'App\Http\Controllers\ClientController@detailsBA');
Route::get('/addDetailsBA/{id}', 'App\Http\Controllers\ClientController@getAddDetailsBA');
Route::post('/addDetailsBAForm', 'App\Http\Controllers\ClientController@addDetailsBAForm');
Route::get('/deletedetailsBA/{id}', 'App\Http\Controllers\ClientController@deletedetailsBA');
Route::get('/printBA/{id}', 'App\Http\Controllers\ClientController@printBA');



