<?php 
// 아직 아무것도 쓰지 않는다.
use Gondr\App\Route;

Route::get('/' , "MainController@index");

Route::get('/user/register' , "UserController@registerPage");
Route::post('/user/register' , "UserController@registerPageProcess");
Route::get('/user/login' , "UserController@loginPage");
Route::post('/user/login' , "UserController@loginPageProcess");
Route::get('/user/logout' , "UserController@logoutPage");

Route::get('/board' , "BoardController@boardPage");
Route::get('/board/view' , "BoardController@viewPage");
Route::get('/board/write' , "BoardController@writePage");
Route::post('/board/write' , "BoardController@writePageProcess");
Route::get('/board/modify' , "BoardController@modifyPage");
Route::post('/board/modify' , "BoardController@modifyPageProcess");
Route::get('/board/delete' , "BoardController@deletePage");

