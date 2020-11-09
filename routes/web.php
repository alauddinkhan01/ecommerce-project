<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/dashboard', 'AdminController@dashboard')->name('dashboard');
Route::match(['get','post'],'adminlogin', 'AdminController@adminlogin')->name('adminlogin');
Route::get('/logout', 'AdminController@logout');
Route::get('/settings', 'AdminController@settings')->name('settings');
Route::post('/settings', 'AdminController@changepassword')->name('changepassword');
Route::get('/update_admin_details', 'AdminController@admindetails')->name('admindetails');
Route::post('/update_admin_details', 'AdminController@updateadmindetails')->name('updateadmindetails');
Route::get('/section','SectionController@section')->name('sections');
Route::post('/section/updatesection/{id}','SectionController@updatesection');
// Route::post('/section/{id}','SectionController@updatesectionstatus');
Route::get('/category','CategoryController@category')->name('category');
Route::post('/category/updatecategory/{id}','CategoryController@updatecategory');
Route::match(['get','post'],'add_editcategory/{id?}', 'CategoryController@addeditcategory')->name('addeditcategory');
