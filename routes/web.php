<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('guest.home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();
#Gestisce una serie di rotte
// Route::get('/admin', 'HomeController@index')->name('admin');

Route::middleware('auth')->prefix('admin')->namespace('Admin')->name('admin.')
->group(function() {
    #pagina di atterraggion dopo il login (con il prefix, l'url é /admin)
    Route::get('/', 'Admincontroller@index')->name('index'); 
});
