<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\AlumnoInactivoController;
use App\Http\Controllers\PeriodoController;
use App\Http\Controllers\GraficacomunidadController;
use App\Http\Controllers\GraficaalumnoController;
use App\Http\Controllers\GraficacursoController;
use App\Http\Controllers\GraficapatrocinadorController;
use App\Http\Controllers\GraficaedadesController;
use App\Http\Controllers\GraficaingresoController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\PeriodosHasCursosController;
use App\Http\Controllers\FullCalenderController;
use App\Http\Controllers\AlumnosHasPeriodosController;
use Illuminate\Support\Facades\Auth;


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
    return view('auth.login');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('alumnos/pdf', [App\Http\Controllers\AlumnosHasPeriodosController::class, 'pdf'])->name('alumnos.pdf');
Route::get('alumnos/excel', [App\Http\Controllers\AlumnoController::class, 'excel'])->name('alumnos.excel');
Route::get('/charts/orders', [App\Http\Controllers\GraficacomunidadController::class, 'ordersChart'])->name('charts.orders');
Auth::routes();


Route::group(['middleware' => ['auth']], function(){
	Route::resource('roles', RolController::class);
	Route::resource('usuarios', UsuarioController::class);
	Route::resource('alumnos', AlumnoController::class);
	Route::resource('alumnosinactivos', AlumnoInactivoController::class);
	Route::resource('periodos', PeriodoController::class);
	Route::resource('cronogramas', FullCalenderController::class);
	Route::resource('gcomunidad', GraficacomunidadController::class);
	Route::resource('cursos', CursoController::class);
	Route::resource('galumnos', GraficaalumnoController::class);
	Route::resource('gcursos', GraficacursoController::class);
	Route::resource('gpatrocinadores', GraficapatrocinadorController::class);
	Route::resource('gedades', GraficaedadesController::class);
	Route::resource('gingresos', GraficaingresoController::class);
	Route::resource('periodo_curso', PeriodosHasCursosController::class);
	Route::resource('alumnos/{id}/metodos', AlumnosHasPeriodosController::class);
	
});
Route::controller(FullCalenderController::class)->group(function(){
    Route::get('/fullcalender', 'index');
    Route::post('/fullcalenderAjax', 'ajax');
});

Route::get('/gcursos', [App\Http\Controllers\GraficaController::class, 'charts'])->name('chart');
Route::get('/gcomunidad', [App\Http\Controllers\GraficaController::class, 'charts2'])->name('chart2');
Route::get('/gingresos', [App\Http\Controllers\GraficaController::class, 'charts3'])->name('chart3');
