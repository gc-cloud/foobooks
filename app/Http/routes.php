<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/books',function(){
  return 'Here are all the books...';
});

Route::get('/books/{category}',function($category){
  return 'Here are all the books in the category of '.$category;
});

Route::get('/practice', function() {

    echo 'Hello World!<br/>';
    echo 'Your environment is: '.App::environment();

});
