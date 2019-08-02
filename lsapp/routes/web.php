<?php

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


/* Route::get('/hello', function () {
    return "<h1>hello world</h1>";
}); 

// Putting dynamic data in the url, it can be more than one
Route::get("/users/{id}/{name}", function($id, $name){
    // return "This is user " . $name . " with an id " . $id;
    return "This is user $name with an id $id";
});

*/

// Rendering view without the controller
/* Route::get("/about", function(){
    // return view("pages/about");

    // The dot syntax is preferred
    return view("pages.about");
}); */

// Rendering View using the controller with the index as a method
Route::get("/", "PagesController@index");
Route::get("/about", "PagesController@about");
Route::get("/services", "PagesController@services");

Route::resource("posts", "PostsController");

Auth::routes();

Route::get('/home', 'HomeController@index');
