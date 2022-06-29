<?php

use App\Http\Controllers\Controller;
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

Route::get('/home','App\Http\Controllers\ControllerHome@home')->name('home');
Route::get('/home/details','App\Http\Controllers\ControllerHome@getHome');
Route::get('/home/weather','App\Http\Controllers\ControllerHome@weather')->name('weather');
//accesso
Route::get("/logout",'App\Http\Controllers\ControllerLogin@logout')->name('logout');
Route::get('/login','App\Http\Controllers\ControllerLogin@login')->name('login');
Route::post("/login", "App\Http\Controllers\ControllerLogin@checkLogin");

//signin
Route::post('/signin', "App\Http\Controllers\ControllerSignin@newUser")->name('newUser');
Route::get('/signin',"App\Http\Controllers\ControllerSignin@signin")->name('signin');
Route::get("/signin/email/{email}","App\Http\Controllers\ControllerSignin@checkEmail");
Route::get("/signin/username/{user}","App\Http\Controllers\ControllerSignin@checkUsername");

//carrello
Route::get('/cart/update','App\Http\Controllers\ControllerCart@update');
Route::get('/cart/delete/{art}','App\Http\Controllers\ControllerCart@delete');
Route::get('/cart','App\Http\Controllers\ControllerCart@cart')->name('cart');

//shop
Route::get('/shop','App\Http\Controllers\ControllerShop@shop')->name('shop');
Route::get('/shop/search/{q}','App\Http\Controllers\ControllerShop@search');
Route::get('/shop/products',"App\Http\Controllers\ControllerShop@getProducts")->name('products');
Route::get("/shop/misure/{id}","App\Http\Controllers\ControllerShop@misura");
Route::get("/shop/review/{art}","App\Http\Controllers\ControllerShop@getReview");
Route::get("/shop/carrello/{art}/{mis}","App\Http\Controllers\ControllerShop@aggiungiCarrello");
//profilo
Route::get('/profile','App\Http\Controllers\ControllerProfile@profile')->name('profile');
Route::get('/profile/ordini','App\Http\Controllers\ControllerProfile@ordini')->name('profile.ordini');
Route::get('/profile/articoli/{id}','App\Http\Controllers\ControllerProfile@articoli');
Route::get("/profile/caricaRecensione/{rec}/{art}/{ord}","App\Http\Controllers\ControllerProfile@caricaRecensione");
Route::get("/profile/aggiornaRecensioni/{art}/{ord}","App\Http\Controllers\ControllerProfile@aggiornaRecensioni");
Route::get("/profile/eliminaRecensione/{art}/{ord}","App\Http\Controllers\ControllerProfile@eliminaRecensione");
//ordine
Route::get('/order','App\Http\Controllers\ControllerOrder@order')->name('order');
Route::post("/ordine/invia","App\Http\Controllers\ControllerOrder@inviaOrdine")->name('orderNow');
