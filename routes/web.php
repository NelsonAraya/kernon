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

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::resource('registro','RegistroController')->middleware('auth');
Route::resource('asistencia','AsistenciaController');
Route::post('asistencia/buscar',[
    'uses' => 'AsistenciaController@buscar',
    'as' => 'asistencia.buscar'
]);

Route::post('evaluacion/crear/{id}/',[
    'uses' => 'EvaluacionController@crear',
    'as' => 'evaluacion.crear'
])->middleware('auth');

Route::post('evaluacion/seguimiento1/{id}/',[
    'uses' => 'EvaluacionController@crearSeguimiento1',
    'as' => 'evaluacion.crearSeguimiento1'
])->middleware('auth');
Route::post('evaluacion/seguimiento2/{id}/',[
    'uses' => 'EvaluacionController@crearSeguimiento2',
    'as' => 'evaluacion.crearSeguimiento2'
])->middleware('auth');
Route::post('evaluacion/seguimiento3/{id}/',[
    'uses' => 'EvaluacionController@crearSeguimiento3',
    'as' => 'evaluacion.crearSeguimiento3'
])->middleware('auth');

Route::get('evaluacion/{id}/editar',[
    'uses' => 'EvaluacionController@editar',
    'as' => 'evaluacion.editar'
])->middleware('auth');

Route::get('evaluacion/{id}/seguimiento1',[
    'uses' => 'EvaluacionController@seguimiento1',
    'as' => 'evaluacion.seguimiento1'
])->middleware('auth');

Route::get('evaluacion/{id}/seguimiento2',[
    'uses' => 'EvaluacionController@seguimiento2',
    'as' => 'evaluacion.seguimiento2'
])->middleware('auth');

Route::get('evaluacion/{id}/seguimiento3',[
    'uses' => 'EvaluacionController@seguimiento3',
    'as' => 'evaluacion.seguimiento3'
])->middleware('auth');

Route::get('evaluacion/ver/{id}/seguimiento1',[
    'uses' => 'EvaluacionController@verseguimiento1',
    'as' => 'evaluacion.verseguimiento1'
])->middleware('auth');
Route::get('evaluacion/ver/{id}/seguimiento2',[
    'uses' => 'EvaluacionController@verseguimiento2',
    'as' => 'evaluacion.verseguimiento2'
])->middleware('auth');
Route::get('evaluacion/ver/{id}/seguimiento3',[
    'uses' => 'EvaluacionController@verseguimiento3',
    'as' => 'evaluacion.verseguimiento3'
])->middleware('auth');

Route::resource('evaluacion','EvaluacionController')->middleware('auth');
Route::get('evaluacion/s',[
    'uses' => 'EvaluacionController@buscar',
    'as' => 'evaluacion.buscar'
])->middleware('auth');

