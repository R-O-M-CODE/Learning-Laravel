<?php

use Illuminate\Support\Facades\Route;
use App\Post;
use App\User;
use App\Role;
use App\Country;
use App\Photo;
use App\Tag;
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

// // read
// Route::get('/read', function(){
//     $results = DB::select('select * from posts where id=?', [1]);

//     foreach($results as $post){
//         return $post->content;
//     }
// });

// // Update
// Route::get('/update', function(){
//     $updated = DB::update('update posts set title="Updated title" where id=?', [1]);
//     return $updated;
// });

// // Delete

// Route::get('/delete', function(){
//     $del = DB::delete('delete from posts where id=?', [1]);
//     return $del;
// });

/*
-------------------------------------
 ELOQUENt
-------------------------------------
*/
// loop through the post table the title
Route::get('/read', function(){

    $posts = Post::all();
    foreach ($posts as $post) {
        return $post->title;
    }

});

// finds the title of the post with id of 2
Route::get('/find', function(){

    $posts = Post::find(2);
        return $posts->title;

});

// reading data with condition

Route::get('/findwhere', function () {
    $posts = Post::where('id',2)->orderBy('id', 'desc')->take(1)->get();
    return $posts;
});

//

Route::get('/findmore', function(){

    // $posts = Post::findOrFail(1);
    // return $posts;

    $posts = Post::where('users_count','<',50)->firstOrFail();

});

// Inserting data

Route::get('/basicinsert', function(){

    $post = new Post;
    $post->title = 'New ORM title insertion';
    $post->content = "Wow eloquent is really cool";
    $post->save();
});

// Update 1

Route::get('/basicinsert', function(){

    $post = Post::find(2);
    $post->title = 'New ORM title insertion to 2';
    $post->content = "Wow eloquent is really cool";
    $post->save();

});

// Create and allow mass assignment
Route::get('/create', function(){
    Post::create(['title' => 'The methos', 'content'=>"WOW i'm learning"]);
});

// update alt

Route::get('/update', function(){
    Post::where('id',2)->where('is_admin', 0)->update(['title'=>'New PHP title', 'content' => 'I love my instructoe']);
});

// deleting data

Route::get('/delete', function(){
    $post = Post::find(3);
    $post->delete();
});

// deleting alt

Route::get('/deletealt',function(){
    Post::destroy([5,6]);
});

//soft deleting (deleting and putting in trash)

Route::get('/softdelete', function(){

    Post::find(2)->delete();

});

// Retrieving deleted data

Route::get('/readsoftdelete', function(){

    // $post = Post::find(2);
    // return $post;

    // $post = Post::withTrashed()->where('id', 2)->get();
    // return $post;

    $post = Post::onlyTrashed()->where('is_admin', 0)->get();
    return $post;

});

// Restoring trashed data

Route::get('/restore', function(){
    Post::withTrashed()->where('is_admin', 0)->restore();
});

// Deleting Permanently
Route::get('/forcedelete', function(){
    Post::onlyTrashed()->where('is_admin', 0)->forceDelete();
});

/*
-------------------------------------
 ELOQUENt Relationship
-------------------------------------
*/

// 1 to 1 relationship

Route::get('/user/{id}/post', function($id){


    return User::find($id)->post;

});

// Inverse relation

Route::get('/post/{id}/user', function($id){
    return Post::find($id)->user->name;
});

// one to many relationship

Route::get('/posts', function(){
    $user = User::find(1);

    foreach ($user->posts as $post){
        echo $post->title."<br/>";
    }
});

// many to many relationship
Route::get('/user/{id}/role', function($id){
    $user = User::find($id);

    foreach ($user->roles as $role){
        return $role->name;
    }
});


// Accessing the pivot/intermediate table
// Intermediate or pivot table is a table that links two
// other tables together

Route::get('user/pivot', function(){

    $user = User::find(1);

    foreach ($user->roles as $role){
        return $role->pivot->created_at;
    }

});

// HAs many through relationship
Route::get('/user/country', function(){
    $country = Country::find(2);
    foreach ($country->posts as $post){
        return $post->title;
    }
});

// Polymorphic relations

Route::get('/user/photos', function(){
    $user = User::find(1);
    foreach ($user->photos as $photo){
        return $photo;
    }
});

// Inverse Polymorphic relations
Route::get('photo/{id}/post', function($id){
    $photo = Photo::findOrFail($id);
    return $photo->imageable;
});

// Many to many polymorphic relationship

Route::get('/post/tag', function(){
    $post = Post::find(1);
    foreach ($post->tags as $tag){
        echo $tag->name;
    }
});

Route::get('/tag/post', function(){
    $tag = Tag::find(2);
    foreach ($tag->posts as $post){
        echo $post->title;
    }
});
