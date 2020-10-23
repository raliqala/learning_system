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

Auth::routes();
Route::get('/member', 'MemberController@index')->name('member')->middleware('member');
Route::get('/admin', 'AdminController@index')->name('admin')->middleware('admin');
Route::get('/profile', 'ProfileController@index')->name('profile');
Route::get('/get_material', 'ProfileController@getMaterial');
Route::get('/get_users', 'CreateEmployeeController@index');
Route::get('/home', 'HomeController@index')->name('home');
 