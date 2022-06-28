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
Route::get('/empresa', 'FormularioController@empresa')->name('formularios.empresa');
Route::get('/perfil-emprendedor', 'FormularioController@perfilEmprendedor')->name('formularios.perfil-emprendedor');
Route::get('/direccionamiento-estrategico', 'FormularioController@direccionamientoEstrategico')->name('formularios.direccionamiento-estrategico');
Route::get('/financiero', 'FormularioController@financiero')->name('formularios.financiero');
Route::get('/mercadeo-y-ventas', 'FormularioController@mercadeoYVentas')->name('formularios.mercadeo-y-ventas');
Route::get('/gestion-tecnica', 'FormularioController@gestionTecnica')->name('formularios.gestion-tecnica');
Route::get('/administracion-normativa', 'FormularioController@administracionNormativa')->name('formularios.administracion-normativa');

// Route::get('/', function () {
//     return redirect('/home');
// });
//
Auth::routes();
//
//
// Route::group(['middleware' => ['auth']], function () {
//     Route::get('/home', 'HomeController@index')->name('home');
//
//     Route::get('/analisis', 'PreguntaController@analisis')->name('equipos.analisis');
//     Route::get('/analisis/exportar', 'PreguntaController@exportar')->name('equipos.exportar');
//     Route::get('/equipos', 'PreguntaController@index')->name('equipos.index');
//     Route::get('/equipos/crear', 'PreguntaController@create')->name('equipos.create');
//     Route::get('/equipos/{pregunta}', 'PreguntaController@show')->name('equipos.show');
//     Route::get('/equipos/{pregunta}/editar', 'PreguntaController@edit')->name('equipos.edit');
//     Route::patch('/equipos/{pregunta}', 'PreguntaController@update')->name('equipos.update');
//     Route::post('/equipos', 'PreguntaController@store')->name('equipos.store');
//
//     Route::get('/reportes', 'ReporteController@index')->name('reportes.index');
//     Route::get('/reportes/exportar/{reporte}', 'ReporteController@exportar')->name('reportes.exportar');
//     Route::get('/reportes/{reporte}', 'ReporteController@show')->name('reportes.show');
//     Route::get('/reportes/{reporte}/verificar', 'ReporteController@verificar')->name('reportes.verificar');
//     Route::post('/reportes/{reporte}', 'ReporteController@verificacion')->name('reportes.verificacion');
//
//
//     Route::get('/anotaciones', 'RondaController@anotaciones')->name('rondas.anotaciones');
//     Route::get('/rondas', 'RondaController@index')->name('rondas.index');
//     Route::get('/rondas/{ronda}', 'RondaController@show')->name('rondas.show');
//     Route::get('/rondas/{ronda}/verificar', 'RondaController@verificar')->name('rondas.verificar');
//     Route::post('/rondas/{ronda}', 'RondaController@verificacion')->name('rondas.verificacion');
//
//     Route::get('/ruta', 'FormularioController@index')->name('rutas.index');
//     Route::patch('/ruta/{formulario}', 'FormularioController@update')->name('rutas.update');
//
//     Route::get('/sistemas', 'GrupoPreguntaController@index')->name('sistemas.index');
//     Route::get('/sistemas/crear', 'GrupoPreguntaController@create')->name('sistemas.create');
//     Route::get('/sistemas/{grupoPregunta}', 'GrupoPreguntaController@show')->name('sistemas.show');
//     Route::get('/sistemas/{grupoPregunta}/editar', 'GrupoPreguntaController@edit')->name('sistemas.edit');
//     Route::patch('/sistemas/{grupoPregunta}', 'GrupoPreguntaController@update')->name('sistemas.update');
//     Route::post('/sistemas', 'GrupoPreguntaController@store')->name('sistemas.store');
//
//
//     Route::get('/usuarios', 'UserController@index')->name('usuarios.index');
//     Route::get('/usuarios/crear', 'UserController@create')->name('usuarios.create');
//     Route::get('/usuarios/{usuario}', 'UserController@show')->name('usuarios.show');
//     Route::get('/usuarios/{usuario}/editar', 'UserController@edit')->name('usuarios.edit');
//     Route::patch('/usuarios/{usuario}', 'UserController@update')->name('usuarios.update');
//     Route::post('/usuarios', 'UserController@store')->name('usuarios.store');
//     Route::post('imagen-usuario/store', 'UserController@uploadImage')->name('imagen-usuario.store');
//
//     Route::post('imagen-registros/store', 'ImagenRegistroController@uploadImages')->name('imagen-registros.store');
//     Route::post('imagen-registros/delete', 'ImagenRegistroController@deleteImage')->name('imagen-registros.delete');
//     Route::post('imagen-especies/store', 'ImagenAveController@uploadImages')->name('imagen-especies.store');
//     Route::post('imagen-especies/delete', 'ImagenAveController@deleteImage')->name('imagen-especies.delete');
//
// });
