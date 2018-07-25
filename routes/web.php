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
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/tasks', [
    'uses'       => 'TaskController@index',
    'middleware' => 'roles',
    'roles'      => ['User','Manager','Admin']
])
->name('tasks.index');

Route::get('/tasks/create', [
    'uses'       => 'TaskController@create',
    'middleware' => 'roles',
    'roles'      => ['Manager', 'Admin']
])
->name('tasks.create');

Route::post('/tasks', [
    'uses'       => 'TaskController@store',
    'middleware' => 'roles',
    'roles'      => ['Manager', 'Admin']
])
->name('tasks.store');

Route::get('/tasks/{task}', [
    'uses'       => 'TaskController@show',
    'middleware' => 'roles',
    'roles'      => ['User', 'Manager', 'Admin']
])
->name('tasks.show');

Route::get('/tasks/{task}/edit', [
    'uses'       => 'TaskController@edit',
    'middleware' => 'roles',
    'roles'      => ['Manager', 'Admin']
])
->name('tasks.edit');

Route::put('/tasks/{task}', [
    'uses'       => 'TaskController@update',
    'middleware' => 'roles',
    'roles'      => ['Manager', 'Admin']
]);

Route::delete('/tasks/{task}', [
    'uses'       => 'TaskController@destroy',
    'middleware' => 'roles',
    'roles'      => ['Manager', 'Admin']
])
->name('tasks.destroy');