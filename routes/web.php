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
/*
Route::get('/', function () {
    return view('welcome');
});
*/

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function(){
    return view("guest.home");
})->name('index');

Route::middleware('auth')
    ->namespace('Admin')
    ->name('admin.')
    ->prefix('admin')
    ->group(function () {
        Route::get('/', 'HomeController@index')->name('index');

        Route::resource('posts', 'PostController')->parameters([
            'posts' => 'post:slug',
        ]);

        Route::resource('categories', 'CategoryController')->parameters([
            'categories' => 'category:slug',
        ]);
    });

Route::get("{any?}", function() {
    return redirect()->route('index');
    // return view("guest.home");
})->where("any", ".*");
