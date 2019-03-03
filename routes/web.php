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
    return view('formulario');
});

Route::post('/save', 'Paciente@store');

Route::get('/getConsultas', function() {
    return view('consultas');
});

Route::get('/getCitas', 'Paciente@consultas');

Route::get('/delCita/{idConsulta}', 'Paciente@destroy');

Route::get('/editarCita/{idConsulta}', 'Paciente@edit');
