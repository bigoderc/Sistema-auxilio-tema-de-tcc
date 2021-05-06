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
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
	// fornecedores
	Route::get('/fornecedor',['as'=>'fornecedor.index', 'uses'=>'FornecedorCOntroller@index']);
	Route::get('/fornecedor/create',['as'=>'fornecedor.create', 'uses'=>'FornecedorCOntroller@create']);
	Route::post('/fornecedor/store',['as'=>'fornecedor.store', 'uses'=>'FornecedorCOntroller@store']);
	Route::get('/fornecedor/edit/{id}',['as'=>'fornecedor.edit', 'uses'=>'FornecedorCOntroller@edit']);
	Route::put('/fornecedor/update/{id}',['as'=>'fornecedor.update', 'uses'=>'FornecedorCOntroller@update']);
	Route::delete('/fornecedor/destroy/{id}',['as'=>'fornecedor.destroy', 'uses'=>'FornecedorCOntroller@destroy']);
	// produtos
	Route::get('/produto',['as'=>'produto.index','uses'=>'ProdutoController@index']);
	Route::get('/produto/create',['as'=>'produto.create', 'uses'=>'ProdutoController@create']);
	Route::post('/produto/store',['as'=>'produto.store', 'uses'=>'ProdutoController@store']);
	Route::get('/produto/edit/{id}',['as'=>'produto.edit', 'uses'=>'ProdutoController@edit']);
	Route::put('/produto/update/{id}',['as'=>'produto.update', 'uses'=>'ProdutoController@update']);
	Route::delete('/produto/destroy/{id}',['as'=>'produto.destroy', 'uses'=>'ProdutoController@destroy']);
});

