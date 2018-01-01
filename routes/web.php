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

//用户模块
//TODO：注册页面
Route::get('/register','RegisterController@index');
//TODO：注册行为
Route::post('/register','RegisterController@register');
//TODO：登录页面
Route::get('/login','LoginController@index');
//TODO：登录行为
Route::post('/login','LoginController@login');
//TODO：登出页面
Route::get('/logout','LoginController@logout');
//TODO：个人设置页面
Route::get('/user/me/setting','UserController@setting');
//TODO：个人设置行为
Route::post('/user/me/setting','UserController@settingStore');


//文章列表
Route::get('/posts','PostController@index');
//创建文章
Route::get('/posts/create','PostController@create');
Route::post('/posts','PostController@store');
//文章详情页
Route::get('/posts/{post}','PostController@show');
//编辑文章
Route::get('/posts/{post}/edit','PostController@edit');
Route::put('/posts/{post}','PostController@update');
//删除文章
Route::get('/posts/{post}/delete','PostController@delete');
//图片上传
Route::post('/posts/image/upload','PostController@imageUpload');







