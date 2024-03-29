<?php
use App\Http\Controllers\UsersController;

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

Route::group(['middleware' => ['role:super-admin|editor|moderador']], function() {
    Route::resource('usuarios', 'UsersController');
   
});

Route::group(['middleware' => ['role:super-admin|editor|moderador']], function() {
    Route::resource('alumnos', 'AlumnosController');
   
});

Route::group(['middleware' => ['role:super-admin|editor|moderador']], function() {
    Route::resource('administrador', 'AdministradorController');
   
});

Route::group(['middleware' => ['role:super-admin|editor|moderador']], function() {
    Route::resource('carpetas', 'ControladorController');
   
});



