<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/', [
    'uses'      => 'App\Http\Controllers\HomeController@index',
    'as'        => ''
]);


Route::middleware('auth','verified')->get('/home', [
    'uses'      => 'App\Http\Controllers\HomeController@redirect',
    'as'        => 'home'
]);



Route::get('/add_doctor_view', [
    'uses'      => 'App\Http\Controllers\AdminController@addview',
    'as'        => 'add_doctor_view'
]);

Route::post('/upload_doctor', [
    'uses'      => 'App\Http\Controllers\AdminController@upload',
    'as'        => 'upload_doctor'
]);

Route::post('/appointment', [
    'uses'      => 'App\Http\Controllers\HomeController@appointment',
    'as'        => 'appointment'
]);

Route::get('/my_appointment', [
    'uses'      => 'App\Http\Controllers\HomeController@myappointment',
    'as'        => 'my_appointment'
]);

Route::get('/alldoctor', [
    'uses'      => 'App\Http\Controllers\HomeController@alldoctor',
    'as'        => 'alldoctor'
]);
Route::get('/contact', [
    'uses'      => 'App\Http\Controllers\HomeController@contact',
    'as'        => 'contact'
]);
Route::get('/about', [
    'uses'      => 'App\Http\Controllers\HomeController@about',
    'as'        => 'about'
]);


Route::get('/cancel_appoint/{id}', [
    'uses'      => 'App\Http\Controllers\HomeController@cancel',
    'as'        => 'cancel_appoint'
]);

Route::get('/show_appointment', [
    'uses'      => 'App\Http\Controllers\AdminController@showappointment',
    'as'        => 'show_appointment'
]);


Route::get('/approved/{id}', [
    'uses'      => 'App\Http\Controllers\AdminController@approved',
    'as'        => 'approved'
]);

Route::get('/canceled/{id}', [
    'uses'      => 'App\Http\Controllers\AdminController@canceled',
    'as'        => 'canceled'
]);

Route::get('/showdoctor', [
    'uses'      => 'App\Http\Controllers\AdminController@showdoctor',
    'as'        => 'showdoctor'
]);

Route::get('/deletedoctor/{id}', [
    'uses'      => 'App\Http\Controllers\AdminController@deletedoctor',
    'as'        => 'deletedoctor'
]);


Route::get('/updatedoctor/{id}', [
    'uses'      => 'App\Http\Controllers\AdminController@updatedoctor',
    'as'        => 'updatedoctor'
]);


Route::post('/edit_doctor/{id}', [
    'uses'      => 'App\Http\Controllers\AdminController@edit_doctor',
    'as'        => 'edit_doctor'
]);
Route::get('/emailview/{id}', [
    'uses'      => 'App\Http\Controllers\AdminController@emailview',
    'as'        => 'emailview'
]);

Route::get('/emailviewcomment/{id}', [
    'uses'      => 'App\Http\Controllers\AdminController@emailviewcomment',
    'as'        => 'emailviewcomment'
]);

Route::post('/sendemail/{id}', [
    'uses'      => 'App\Http\Controllers\AdminController@sendemail',
    'as'        => 'sendemail'
]);
Route::post('/sendemailcomment/{id}', [
    'uses'      => 'App\Http\Controllers\AdminController@sendemailcomment',
    'as'        => 'sendemailcomment'
]);
Route::get('/blog', [
    'uses'      => 'App\Http\Controllers\BlogController@index',
    'as'        => 'blog'
]);


Route::post('/add_blog', [
    'uses'      => 'App\Http\Controllers\BlogController@addblog',
    'as'        => 'add_blog'
]);

Route::get('/showblog', [
    'uses'      => 'App\Http\Controllers\BlogController@showblog',
    'as'        => 'showblog'
]);

Route::get('/deleteblog/{id}', [
    'uses'      => 'App\Http\Controllers\BlogController@deleteblog',
    'as'        => 'deleteblog'
]);

Route::get('/updateblog/{id}', [
    'uses'      => 'App\Http\Controllers\BlogController@updateblog',
    'as'        => 'updateblog'
]);



Route::post('/editblog/{id}', [
    'uses'      => 'App\Http\Controllers\BlogController@editblog',
    'as'        => 'editblog'
]);

Route::get('/blog_detels/{id}', [
    'uses'      => 'App\Http\Controllers\BlogController@blogdetels',
    'as'        => 'blog_detels'
]);

Route::get('/bloghome', [
    'uses'      => 'App\Http\Controllers\BlogController@bloghome',
    'as'        => 'bloghome'
]);

Route::post('/blogcomment', [
    'uses'      => 'App\Http\Controllers\BlogController@blogcomment',
    'as'        => 'blogcomment'
]);

Route::get('/commentblog', [
    'uses'      => 'App\Http\Controllers\AdminController@commentblog',
    'as'        => 'commentblog'
]);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
