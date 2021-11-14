<?php

use Illuminate\Support\Facades\Auth;
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

// Rotta che gestisce la homepage visible agli utenti
Route::get('/', 'HomeController@index')->name('index');
Route::get('/vue-posts', 'HomeController@listPostsApi')->name('list-posts-api');

//Rotta per guest
Route::resource('/posts', 'PostController');

//Serie di rotte che gestisce tutto il meccanismo di autenticazione
Auth::routes();

//Serie di rotte che gestiscono il backoffice (parte amministrativa)
// Route::get('/admin', 'HomeController@index')->name('admin');

Route::middleware('auth')->namespace('Admin')->prefix('admin')->name('admin.')
    ->group(function () {
        //Pagina di atterragio dopo il login (con il prefix, l'url è /admin)
        Route::get('/', 'HomeController@index')->name('index');

        Route::resource('/posts', 'PostController');
        Route::resource('/categories', 'CategoryController');

        #Rotta per la pagina profilo
        Route::get('/profile', 'HomeController@profile')->name('profile');
        Route::post('/generate-token', 'HomeController@generateToken')->name('generate-token');
    });
