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
    return redirect()->route('home');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
	// Alunoes
	Route::get('/aluno',['as'=>'aluno.index', 'uses'=>'AlunoCOntroller@index']);
	Route::get('/aluno/create',['as'=>'aluno.create', 'uses'=>'AlunoCOntroller@create']);
	Route::post('/aluno/store',['as'=>'aluno.store', 'uses'=>'AlunoCOntroller@store']);
	Route::get('/aluno/edit/{id}',['as'=>'aluno.edit', 'uses'=>'AlunoCOntroller@edit']);
	Route::put('/aluno/update/{id}',['as'=>'aluno.update', 'uses'=>'AlunoCOntroller@update']);
	Route::delete('/aluno/destroy/{id}',['as'=>'aluno.destroy', 'uses'=>'AlunoCOntroller@destroy']);
	// areas
	Route::get('/area',['as'=>'area.index','uses'=>'AreaController@index']);
	Route::get('/area/create',['as'=>'area.create', 'uses'=>'AreaController@create']);
	Route::post('/area/store',['as'=>'area.store', 'uses'=>'AreaController@store']);
	Route::get('/area/edit/{id}',['as'=>'area.edit', 'uses'=>'AreaController@edit']);
	Route::put('/area/update/{id}',['as'=>'area.update', 'uses'=>'AreaController@update']);
	Route::delete('/area/destroy/{id}',['as'=>'area.destroy', 'uses'=>'AreaController@destroy']);
	// Professor
	Route::get('/professor',['as'=>'professor.index','uses'=>'ProfessorController@index']);
	Route::get('/professor/create',['as'=>'professor.create', 'uses'=>'ProfessorController@create']);
	Route::post('/professor/store',['as'=>'professor.store', 'uses'=>'ProfessorController@store']);
	Route::get('/professor/edit/{id}',['as'=>'professor.edit', 'uses'=>'ProfessorController@edit']);
	Route::put('/professor/update/{id}',['as'=>'professor.update', 'uses'=>'ProfessorController@update']);
	Route::delete('/professor/destroy/{id}',['as'=>'professor.destroy', 'uses'=>'ProfessorController@destroy']);
	//tema
	Route::get('/tema',['as'=>'tema.index','uses'=>'TemaController@index']);
	Route::get('/tema/create',['as'=>'tema.create', 'uses'=>'TemaController@create']);
	Route::post('/tema/store',['as'=>'tema.store', 'uses'=>'TemaController@store']);
	Route::get('/tema/edit/{id}',['as'=>'tema.edit', 'uses'=>'TemaController@edit']);
	Route::put('/tema/update/{id}',['as'=>'tema.update', 'uses'=>'TemaController@update']);
	Route::delete('/tema/destroy/{id}',['as'=>'tema.destroy', 'uses'=>'TemaController@destroy']);
	//projeto
	Route::get('/projeto',['as'=>'projeto.index','uses'=>'ProjetoController@index']);
	Route::get('/projeto/create',['as'=>'projeto.create', 'uses'=>'ProjetoController@create']);
	Route::post('/projeto/store',['as'=>'projeto.store', 'uses'=>'ProjetoController@store']);
	Route::get('/projeto/edit/{id}',['as'=>'projeto.edit', 'uses'=>'ProjetoController@edit']);
	Route::put('/projeto/update/{id}',['as'=>'projeto.update', 'uses'=>'ProjetoController@update']);
	Route::delete('/projeto/destroy/{id}',['as'=>'projeto.destroy', 'uses'=>'ProjetoController@destroy']);
});

