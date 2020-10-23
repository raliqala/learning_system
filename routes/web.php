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
Route::post('/add_material', 'ProfileController@store');
Route::get('/remove_material/{id}', 'ProfileController@destroy');
Route::get('/edit_material/{id}/edit', 'ProfileController@edit');
Route::get('/get_material', 'ProfileController@getMaterial');
Route::get('/get_users', 'CreateEmployeeController@index');
Route::post('/add_users', 'CreateEmployeeController@store');
Route::get('/home', 'HomeController@index')->name('home');

Route::post('/add_material', 'MemberController@store');
Route::get('/remove_material/{id}', 'MemberController@destroy');
Route::get('/edit_material/{id}/edit', 'MemberController@edit');
Route::get('/get_material', 'MemberController@getMaterial');

Route::get('/it_department', 'DepartmentController@it_department');
Route::get('/creative_department', 'DepartmentController@creative');
Route::get('/customer_department', 'DepartmentController@customerService');
Route::get('/get_postInfo/{id}', 'DepartmentController@postInformation');
 