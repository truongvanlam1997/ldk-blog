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
    return view('layouts.app');
});



Route::group(['prefix' => 'post', 'namespace' => 'Post', 'as' => 'post.'], function () {
    Route::get('/', 'IndexController')->name('index');
    Route::get('show/{id}', 'ShowController')->name('show');
    Route::get('create', 'CreateController@create')->name('create');
    Route::post('insert', 'CreateController@insert')->name('insert');
    Route::get('delete/{id}', 'DeleteController')->name('delete');
    Route::get('edit/{id}', 'UpdateController@edit')->name('edit');
    Route::put('update/{id}', 'UpdateController@update')->name('update');
});
Route::group(['prefix' => 'tag', 'namespace' => 'Tag', 'as' => 'tag.'], function () {
    Route::get('/', 'IndexController')->name('index');
    Route::get('show', 'ShowController')->name('show');
    Route::get('create', 'CreateController@create')->name('create');
    Route::post('insert', 'CreateController@insert')->name('insert');
    Route::get('delete/{id}', 'DeleteController')->name('delete');
});
Route::group(['prefix' => 'category', 'namespace' => 'Category', 'as' => 'category.'], function () {
    Route::get('/', 'IndexController')->name('index');
    Route::get('show/{id}', 'ShowController')->name('show');
    Route::get('create', 'CreateController@create')->name('create');
    Route::post('insert', 'CreateController@insert')->name('insert');
    Route::get('delete/{id}', 'DeleteController')->name('delete');
    Route::get('edit/{id}', 'UpdateController@edit')->name('edit');
    Route::put('update/{id}', 'UpdateController@update')->name('update');
});
Route::group(['prefix' => 'author', 'namespace' => 'Author', 'as' => 'author.'], function () {
    Route::get('/', 'IndexController')->name('index');
    Route::get('show/{id}', 'ShowController')->name('show');
    Route::get('create', 'CreateController@create')->name('create');
    Route::post('insert', 'CreateController@insert')->name('insert');
    Route::get('delete/{id}', 'DeleteController')->name('delete');
    Route::get('edit/{id}', 'UpdateController@edit')->name('edit');
    Route::put('update/{id}', 'UpdateController@update')->name('update');
});
