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



/*Auth::routes();*/
Auth::routes(['register'=>false]); //Para que no se puedan registrar directamente

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('administracion/usuarios','Admin\UserController')->parameters(['usuario'=>'usuario'])->names('admin.usuarios');

Route::get('admin/usuarios/empresas','Admin\UserController@usuariosEmpresas')->name('admin.usuarios.empresas');

//Para el perfil
Route::resource('empresas','Empresas\EmpresaController')->parameters(['empresa'=>'empresa'])->names('empresas');

//Para el perfil
Route::resource('candidatos','Empresas\CandidatoController')->parameters(['candidato'=>'candidato'])->names('candidatos');



Route::get('usuarios/empresas/{id}', 'Empresas\EmpresaController@listadoUsuarios')->name('empresas.usuarios');

Route::get('usuarios/empresas/create/{id}', 'Empresas\EmpresaController@createUsuarioEmpresa')->name('empresas.usuarios.create');

Route::get('empresas/usuarios/admin', 'Admin\UserController@createUsuarioEmpresa')->name('create.usuarios.empresas');

Route::get('candidatos/empresas/{id}', 'Empresas\EmpresaController@createCandidatoEmpresa')->name('candidatos.empresas');

Route::get('/', 'HomeController@index')->name('home');


Route::post('empresas/usuarios/admin', 'Admin\UserController@store2')->name('store.usuarios.empresas');

Route::get('admin/usuarios/por/empresas/{id}','Admin\UserController@createUsuarioPorEmpresa')->name('admin.usuarios.por.empresas');

Route::post('usuarios/empresa/admin', 'Admin\UserController@store3')->name('store3.usuarios.empresas');