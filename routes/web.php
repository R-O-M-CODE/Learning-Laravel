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

// Route::get('/about', function () {
//     return "About US";
// });


// Route::get('/contact', function () {
//     return "Contact Us";
// });

// Route::get('/post/{id}/{name}', function($id,$name){
//     return "This is post number ". $id ." published by ".$name;
// });

// // naming routes
// Route::get('admin/posts/example', array('as'=>'admin.home' ,function(){

//     $url = route('admin.home');

//     return "This url is ". $url;

// }));

// using route and coontrollers
Route::get('/post/{id}', 'NewPostController@index');

// using resource

Route::resource('posts', "NewPostController");

Route::get('/contact', 'NewPostController@contact');