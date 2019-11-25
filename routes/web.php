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
    if(Auth::check())
      return view('home');
    return view('auth/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/saidas', 'SaidaController@index')->name('saidas.index');
Route::get('/saidas/deletar/{id}', 'SaidaController@deletar')->name('saidas.deletar');
Route::post('/saidas/cadastrar', 'SaidaController@cadastrar')->name('saidas.cadastrar');
Route::post('/saidas/atualizar}', 'SaidaController@atualizar')->name('saidas.atualizar');

Route::get('/entradas', 'EntradaController@index')->name('entradas.index');
Route::get('/entradas/deletar/{id}', 'EntradaController@deletar')->name('entradas.deletar');
Route::post('/entradas/cadastrar', 'EntradaController@cadastrar')->name('entradas.cadastrar');
Route::post('/entradas/atualizar}', 'EntradaController@atualizar')->name('entradas.atualizar');

Route::get('/despesas', 'DespesaController@index')->name('despesas.index');
Route::get('/despesas/deletar/{id}', 'DespesaController@deletar')->name('despesas.deletar');
Route::post('/despesas/cadastrar', 'DespesaController@cadastrar')->name('despesas.cadastrar');
Route::post('/despesas/atualizar}', 'DespesaController@atualizar')->name('despesas.atualizar');

Route::get('/contas', 'ContaController@index')->name('contas.index');
Route::get('/contas/deletar/{id}', 'ContaController@deletar')->name('contas.deletar');
Route::post('/contas/cadastrar', 'ContaController@cadastrar')->name('contas.cadastrar');
Route::post('/contas/atualizar}', 'ContaController@atualizar')->name('contas.atualizar');

Route::get('/tipo_contas', 'TipoContaController@index')->name('tipo_contas.index');
Route::get('/tipo_contas/deletar/{id}', 'TipoContaController@deletar')->name('tipo_contas.deletar');
Route::post('/tipo_contas/cadastrar', 'TipoContaController@cadastrar')->name('tipo_contas.cadastrar');
Route::post('/tipo_contas/atualizar}', 'TipoContaController@atualizar')->name('tipo_contas.atualizar');

Route::get('/tipo_despesas', 'TipoDespesasController@index')->name('tipo_despesas.index');
Route::get('/tipo_despesas/deletar/{id}', 'TipoDespesasController@deletar')->name('tipo_despesas.deletar');
Route::post('/tipo_despesas/cadastrar', 'TipoDespesasController@cadastrar')->name('tipo_despesas.cadastrar');
Route::post('/tipo_despesas/atualizar}', 'TipoDespesasController@atualizar')->name('tipo_despesas.atualizar');

Route::get('/subtipo_despesas', 'SubTipoDespesasController@index')->name('subtipo_despesas.index');
Route::get('/subtipo_despesas/deletar/{id}', 'SubTipoDespesasController@deletar')->name('subtipo_despesas.deletar');
Route::post('/subtipo_despesas/cadastrar', 'SubTipoDespesasController@cadastrar')->name('subtipo_despesas.cadastrar');
Route::post('/subtipo_despesas/atualizar}', 'SubTipoDespesasController@atualizar')->name('subtipo_despesas.atualizar');
