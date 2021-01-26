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
    return view('home');
});

Route::get('/register', function () {
	return view('register');
});

Route::get('/login', function () {
	return view('login');
});

Route::get('/users', 'UserController@getAllUsers');

Route::post('dologin', 'UserController@login');

Route::post('doregister', 'UserController@register');

Route::post('edituser', 'UserController@editForm');

Route::post('doedituser', 'UserController@editUser');

Route::post('deleteuser', 'UserController@deleteUser');

Route::get('/logout', 'UserController@logout');

Route::get('/create', function () { return view('createpost'); });

Route::post('docreate', 'PostController@createPost');

Route::get('/view', 'PostController@viewPosts');
