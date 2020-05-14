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
// Route::get('/post/{id}', 'NewPostController@index');

// using resource

// Route::resource('posts', "NewPostController");

// Route::get('/contact', 'NewPostController@contact');

// Route::get('post/{id}/{name}/{password}', 'NewPostController@showPost');

/*
-------------------------------------
 Application Routes
-------------------------------------
*/

// Creating or inserting into database
Route::get('/insert', function(){
    DB::insert('insert into posts(title, content) values(?,?)', ['PHP with laravel', 'Php is the best thing that has happened to laravel']);
});

// read
Route::get('/read', function(){
    $results = DB::select('select * from posts where id=?', [1]);

    foreach($results as $post){
        return $post->content;
    }
});

// Update
Route::get('/update', function(){
    $updated = DB::update('update posts set title="Updated title" where id=?', [1]);
    return $updated;
});

// Delete

Route::get('/delete', function(){
    $del = DB::delete('delete from posts where id=?', [1]);
    return $del;
});
