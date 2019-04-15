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
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

/* Route Contacts*/
Route::post('contact-add', 'Contact\ContactController@store')->name('contact.store');
Route::post('contact-update/{contact}', 'Contact\ContactController@update')->name('contact.update');
Route::get('contact/', 'Contact\ContactController@index')->name('contact.index');
Route::get('contact-detail/{contact}', 'Contact\ContactController@show')->name('contact.show');
Route::get('contact-delete/{contact}', 'Contact\ContactController@delete')->name('contact.delete');
Route::get('contact-form-add/', 'Contact\ContactController@create')->name('contact.create');
Route::get('contact-search/', 'Contact\ContactController@search')->name('contact.search');
//Route::post('contact-add/', 'Contact\ContactController@store')->name('contact.add');


