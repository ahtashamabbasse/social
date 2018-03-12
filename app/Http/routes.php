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

Route::get('/', [function () {
    return view('welcome');
}])->name("home");


Route::post("/signUp",["as"=>"signup","uses"=>"UserController@UserSignUp"]);
Route::post("/signIn",["as"=>"signin","uses"=>"UserController@UserSignIn"]);

Route::get("/dashboard",[
    'uses'=>"PostController@dashboard",
    "middleware"=>"auth"
]);
Route::get("/account",[
    "middleware"=>"auth",
    "as"=>"account",
    "uses"=>"UserController@getAccount"
]);
Route::post("/save",["as"=>"save","uses"=>"UserController@save"]);

Route::post("/createPost",[
    "as"=>"create",
    "middleware"=>"auth",
    "uses"=>"PostController@Create"
]);
Route::get("/Delete-Post/{id}",[
    "as"=>"pDelete",
    "middleware"=>"auth",
    "uses"=>"PostController@postDelete"
]);
Route::get("/logout",[
    "as"=>"logout",
    "middleware"=>"auth",
    "uses"=>"UserController@logout"
]);
Route::post("edit",["as"=>"edit","uses"=>"PostController@postUpdate"]);
Route::post("like",["as"=>"like","uses"=>"PostController@postLike"]);
