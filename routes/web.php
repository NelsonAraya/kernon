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

Route::get('registro/{usuarios}/roles','RegistroController@roles')
    ->name('registro.roles')->middleware(['auth','role:registro']);
Route::match(['put','patch'],'registro/roles/{usuarios}','RegistroController@permisos')
    ->name('registro.permisos')->middleware(['auth','role:registro']);
Route::resource('registro','RegistroController')->middleware(['auth','role:registro']);

Route::resource('asistencia','AsistenciaController')->middleware(['auth','role:asistencia']);

Route::resource('informe','InformeController')->middleware(['auth','role:informe']);
Route::post('informe/buscar',[
    'uses' => 'InformeController@buscar',
    'as' => 'informe.buscar'
])->middleware(['auth','role:informe']);

Route::post('evaluacion/crear/{id}/',[
    'uses' => 'EvaluacionController@crear',
    'as' => 'evaluacion.crear'
])->middleware(['auth','role:evaluacion']);
Route::post('evaluacion/seguimiento1/{id}/',[
    'uses' => 'EvaluacionController@crearSeguimiento1',
    'as' => 'evaluacion.crearSeguimiento1'
])->middleware(['auth','role:evaluacion']);
Route::post('evaluacion/seguimiento2/{id}/',[
    'uses' => 'EvaluacionController@crearSeguimiento2',
    'as' => 'evaluacion.crearSeguimiento2'
])->middleware(['auth','role:evaluacion']);
Route::post('evaluacion/seguimiento3/{id}/',[
    'uses' => 'EvaluacionController@crearSeguimiento3',
    'as' => 'evaluacion.crearSeguimiento3'
])->middleware(['auth','role:evaluacion']);
Route::get('evaluacion/{id}/editar',[
    'uses' => 'EvaluacionController@editar',
    'as' => 'evaluacion.editar'
])->middleware(['auth','role:evaluacion']);
Route::get('evaluacion/{id}/seguimiento1',[
    'uses' => 'EvaluacionController@seguimiento1',
    'as' => 'evaluacion.seguimiento1'
])->middleware(['auth','role:evaluacion']);
Route::get('evaluacion/{id}/seguimiento2',[
    'uses' => 'EvaluacionController@seguimiento2',
    'as' => 'evaluacion.seguimiento2'
])->middleware(['auth','role:evaluacion']);
Route::get('evaluacion/{id}/seguimiento3',[
    'uses' => 'EvaluacionController@seguimiento3',
    'as' => 'evaluacion.seguimiento3'
])->middleware(['auth','role:evaluacion']);
Route::get('evaluacion/ver/{id}/seguimiento1',[
    'uses' => 'EvaluacionController@verseguimiento1',
    'as' => 'evaluacion.verseguimiento1'
])->middleware(['auth','role:evaluacion']);
Route::get('evaluacion/ver/{id}/seguimiento2',[
    'uses' => 'EvaluacionController@verseguimiento2',
    'as' => 'evaluacion.verseguimiento2'
])->middleware(['auth','role:evaluacion']);
Route::get('evaluacion/ver/{id}/seguimiento3',[
    'uses' => 'EvaluacionController@verseguimiento3',
    'as' => 'evaluacion.verseguimiento3'
])->middleware(['auth','role:evaluacion']);
Route::resource('evaluacion','EvaluacionController')->middleware(['auth','role:evaluacion']);
Route::get('evaluacion/s',[
    'uses' => 'EvaluacionController@buscar',
    'as' => 'evaluacion.buscar'
])->middleware(['auth','role:evaluacion']);

