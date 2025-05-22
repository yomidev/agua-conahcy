<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Frontend
Route::get('/', function () {
    return view('congreso');
});
Route::get('/',[App\Http\Controllers\FrontendController::class, 'congreso'])->name('congreso');
Route::get('/servicios',[App\Http\Controllers\FrontendController::class, 'services'])->name('services');
Route::get('/posgrados',[App\Http\Controllers\FrontendController::class, 'postgraduate'])->name('postgraduate');
Route::get('/investigacion',[App\Http\Controllers\FrontendController::class, 'investigation'])->name('investigation');
Route::get('/vinculacion',[App\Http\Controllers\FrontendController::class, 'vinculation'])->name('vinculation');
Route::get('/index',[App\Http\Controllers\FrontendController::class, 'index'])->name('index');
Route::get('/congreso/registro', [App\Http\Controllers\FrontendController::class, 'registro'])->name('registro');
Route::post('/registro/step/{step}', [App\Http\Controllers\FrontendController::class, 'handleStep'])->name('registro.step');
Route::post('/registro/completar', [App\Http\Controllers\FrontendController::class, 'completeRegistration'])->name('registro.complete');
Auth::routes();
Route::any('register', function () { abort(403);});


Route::middleware('auth')->group(function(){
    Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    //Tecnologicos CRUD
    Route::get('/admin/tecnologicos',[App\Http\Controllers\AdminController::class, 'tecnologicos'])->name('schools');
    Route::post('/admin/tecnologicos/store',[App\Http\Controllers\AdminController::class, 'tecnologicos_create'])->name('schools_create');
    Route::put('/admin/tecnologicos/update/{id}',[App\Http\Controllers\AdminController::class,'tecnologicos_update'])->name('schools_update');
    Route::get('/admin/tecnologicos/delete/{id}',[App\Http\Controllers\AdminController::class, 'tecnologicos_delete'])->name('schools_delete');
    //Infraestructura CRUD
    Route::get('/admin/infraestructura',[App\Http\Controllers\AdminController::class,'infraestructura'])->name('equipment');
    Route::post('/admin/infraestructura/store',[App\Http\Controllers\AdminController::class,'infraestructura_create'])->name('equipment_create');
    Route::put('/admin/infraestructura/update/{id}',[App\Http\Controllers\AdminController::class, 'infraestructura_update'])->name('equipment_update');
    Route::get('/admin/infraestructura/delete/{id}',[App\Http\Controllers\AdminController::class, 'infraestructura_delete'])->name('equipment_delete');
    //Servicios CRUD
    Route::get('/admin/servicios',[App\Http\Controllers\AdminController::class,'servicios'])->name('service');
    Route::post('/admin/servicios/store',[App\Http\Controllers\AdminController::class,'servicios_create'])->name('services_create');
    Route::put('/admin/servicios/update/{id}',[App\Http\Controllers\AdminController::class,'servicios_update'])->name('services_update');
    Route::get('/admin/servicios/delete/{id}',[App\Http\Controllers\AdminController::class, 'servicios_delete'])->name('services_delete');
    //Oferta Educativa CRUD
    Route::get('/admin/posgrados',[App\Http\Controllers\AdminController::class,'posgrados'])->name('posgrados');
    Route::post('/admin/posgrados/store',[App\Http\Controllers\AdminController::class,'posgrados_create'])->name('posgrados_create');
    Route::put('/admin/posgrados/update/{id}',[App\Http\Controllers\AdminController::class,'posgrados_update'])->name('posgrados_update');
    Route::get('/admin/posgrados/delete/{id}', [App\Http\Controllers\AdminController::class, 'posgrados_delete'])->name('posgrados_delete');
    //Investigadores CRUD
    Route::get('/admin/investigadores',[App\Http\Controllers\AdminController::class,'investigadores'])->name('investigadores');
    Route::post('/admin/investigadores/store',[App\Http\Controllers\AdminController::class,'investigadores_create'])->name('investigadores_create');
    Route::put('/admin/investigadores/update/{id}',[App\Http\Controllers\AdminController::class,'investigadores_update'])->name('investigadores_update');
    Route::get('/admin/investigadores/delete/{id}',[App\Http\Controllers\AdminController::class,'investigadores_delete'])->name('investigadores_delete');
    //Lineas de Investigacion CRUD
    Route::get('/admin/investigacion',[App\Http\Controllers\AdminController::class,'investigacion'])->name('investigacion');
    Route::post('/admin/investigacion/store',[App\Http\Controllers\AdminController::class,'investigacion_create'])->name('investigacion_create');
    Route::put('/admin/investigacion/update/{id}',[App\Http\Controllers\AdminController::class,'investigacion_update'])->name('investigacion_update');
    Route::get('/admin/investigacion/delete/{id}',[App\Http\Controllers\AdminController::class,'investigacion_delete'])->name('investigacion_delete');
    //Articulos CRUD
    Route::get('/admin/articulos',[App\Http\Controllers\AdminController::class,'articulos'])->name('articulos');
    Route::post('/admin/articulos/store',[App\Http\Controllers\AdminController::class,'articulos_create'])->name('articulos_create');
    Route::put('/admin/articulos/update/{id}',[App\Http\Controllers\AdminController::class,'articulos_update'])->name('articulos_update');
    Route::get('/admin/articulos/delete/{id}',[App\Http\Controllers\AdminController::class,'articulos_delete'])->name('articulos_delete');
    //Proyectos CRUD
    Route::get('/admin/proyectos',[App\Http\Controllers\AdminController::class,'proyectos'])->name('proyectos');
    Route::post('/admin/proyectos/store',[App\Http\Controllers\AdminController::class,'proyectos_create'])->name('proyectos_create');
    Route::put('/admin/proyectos/update/{id}',[App\Http\Controllers\AdminController::class,'proyectos_update'])->name('proyectos_update');
    Route::get('/admin/proyectos/delete/{id}',[App\Http\Controllers\AdminController::class,'proyectos_delete'])->name('proyectos_delete');
    //Instituciones CRUD
    Route::get('/admin/instituciones',[App\Http\Controllers\AdminController::class, 'instituciones'])->name('instituciones');
    Route::post('/admin/instituciones/store',[App\Http\Controllers\AdminController::class,'instituciones_create'])->name('instituciones_create');
    Route::put('/admin/instituciones/update/{id}',[App\Http\Controllers\AdminController::class,'instituciones_update'])->name('instituciones_update');
    Route::get('/admin/instituciones/delete/{id}',[App\Http\Controllers\AdminController::class,'instituciones_delete'])->name('instituciones_delete');
    //Dependencias CRUD
    Route::get('/admin/dependecias',[App\Http\Controllers\AdminController::class, 'dependencias'])->name('dependencias');
    Route::post('/admin/dependecias/store',[App\Http\Controllers\AdminController::class,'dependencias_create'])->name('dependencias_create');
    Route::put('/admin/dependecias/update/{id}',[App\Http\Controllers\AdminController::class,'dependencias_update'])->name('dependencias_update');
    Route::get('/admin/dependecias/delete/{id}',[App\Http\Controllers\AdminController::class,'dependencias_delete'])->name('dependencias_delete');
    //Internacional CRUD
    Route::get('/admin/internacional',[App\Http\Controllers\AdminController::class, 'internacional'])->name('internacional');
    Route::post('/admin/internacional/store',[App\Http\Controllers\AdminController::class,'internacional_create'])->name('internacional_create');
    Route::put('/admin/internacional/update/{id}',[App\Http\Controllers\AdminController::class,'internacional_update'])->name('internacional_update');
    Route::get('/admin/internacional/delete/{id}',[App\Http\Controllers\AdminController::class,'internacional_delete'])->name('internacional_delete');
    //Register Info
    Route::get('/admin/registro',[App\Http\Controllers\AdminController::class, 'registro'])->name('registro.admin');
    Route::get('/admin/registro/delete/{id}',[App\Http\Controllers\AdminController::class, 'registro_delete'])->name('registro_delete');
    Route::put('/admin/registro/update/{id}',[App\Http\Controllers\AdminController::class, 'registro_update'])->name('registro_update');
});

