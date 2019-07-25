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
Route::get('home', function () {
    return redirect()->route('post.index');
});
//Auth::routes();
Auth::routes(['verify' => true]);
Route::group(['prefix' => 'login', 'as' => 'login.'], function () {
    Route::get('notactivated', function () {
        return view('error.notactivated');
    })->name('notactivated');
});


Route::group(['prefix' => 'post', 'namespace' => 'Post', 'as' => 'post.', 'middleware' => 'verified'], function () {
    Route::get('/', 'IndexController')->name('index');
    Route::get('index-trash', 'IndexTrashController')->name('index-trash');
    Route::get('show/{id}', 'ShowController')->name('show');
    Route::get('create', 'CreateController@create')->name('create');
    Route::post('insert', 'CreateController@insert')->name('insert');
    Route::get('delete/{id}', 'DeleteController')->name('delete');
    Route::get('edit/{id}', 'UpdateController@edit')->name('edit');
    Route::put('update/{id}', 'UpdateController@update')->name('update');
    Route::get('trash/{id}', 'TrashController')->name('trash');
    Route::get('restore/{id}', 'RestoreController')->name('restore');
    Route::get('clone/{id}', 'CloneController')->name('clone');
    Route::get('bulk', 'BulkController')->name('bulk');
    Route::get('search', 'SearchController@search')->name('search');
    Route::get('search-trash', 'SearchController@searchTrash')->name('search-trash');
    Route::get('sort/{sort}/{order}', 'SortController@sort')->name('sort');
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
