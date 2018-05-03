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
	tipos de rutas get post delet put resource 
*/

Route::get('/', function () {
    return view('welcome');
});





Route::get('/home', 'HomeController@index')->name('home');


Route::get('paginas/portafolio', function () {
    return view('paginas/portafolio');
});

Route::get('paginas/planificacion', function () {
    return view('paginas/planificacion');
});

Route::get('paginas/plangestion', function () {
    return view('paginas/plangestion');
});

Route::get('paginas/anayeva', function () {
    return view('paginas/anayeva');
});

Route::get('paginas/reporte', function () {
    return view('paginas/reporte');
});

Route::get('paginas/graficos', function () {
    return view('paginas/graficos');
});

Route::get('paginas/preseleccion', function () {
    return view('paginas/preseleccion');
});

Route::get('paginas/autoevaluacion', function () {
    return view('paginas/autoevaluacion');
});

//grupo de rutas con controlador PORTAFOLIO
                        //prefijo o nombre q se le da al grupo
Route::group(['prefix' => 'portafolio'], function(){
                   //             // nombre controlador 
Route::get("delete/{id}", "ControllerPortafolios@destroy");
Route::post("store", "ControllerPortafolios@store");
Route::get("edit/{id}", 'ControllerPortafolios@edit');
Route::patch("edit/update/{id}", 'ControllerPortafolios@update');
});
Route::resource("portafolio", "ControllerPortafolios");
Auth::routes();

//grupo de rutas con controlador PLANGESTION
Route::group(['prefix' => 'plangestion'], function(){
                   //             // nombre controlador 
Route::get("delete/{id}", "ControllerPGestiones@destroy");
Route::post("store", "ControllerPGestiones@store");
Route::get("edit/{id}", 'ControllerPGestiones@edit');
Route::patch("edit/update/{id}", 'ControllerPGestiones@update');
});
Route::resource("plangestion", "ControllerPGestiones");

//grupo de rutas con controlador Autoevaluacion
Route::group(['prefix' => 'autoevaluacion'], function(){
                   //             // nombre controlador 
Route::get("delete/{id}", "ControllerAutoevaluaciones@destroy");
Route::post("store", "ControllerAutoevaluaciones@store");
Route::get("edit/{id}", "ControllerAutoevaluaciones@edit");
Route::patch("edit/update/{id}", "ControllerAutoevaluaciones@update");
});
Route::resource("autoevaluacion", "ControllerAutoevaluaciones");

//grupo de rutas con controlador Anayeva
Route::group(['prefix' => 'anayeva'], function(){
                   //             // nombre controlador 
Route::get("delete/{id}", "ControllerAnayevas@destroy");
Route::post("store", "ControllerAnayevas@store");
Route::get("edit/{id}", 'ControllerAnayevas@edit');
Route::patch("edit/update/{id}", 'ControllerAnayevas@update');
Route::post("ObtenerInfo","ControllerAnayevas@ObtnerDatos");

//tabla2 
Route::post("store2", "ControllerAnayevas@store2");
Route::get("delete/{id}", "ControllerAnayevas@destroy2");
//tabla3 medidas existentes
Route::post("store3", "ControllerAnayevas@store3");
Route::get("delete/{id}", "ControllerAnayevas@destroy3");
//tabla4 medidas propuestas
Route::post("store4", "ControllerAnayevas@store4");
Route::get("delete/{id}", "ControllerAnayevas@destroy4");
});
Route::resource("anayeva", "ControllerAnayevas");

//Route::group(['prefix' => 'calificacion'], function(){
Route::get('calificacion', function(){

Route::post("calificacion/store", "ControllerAnayevas@store2");
Route::get("delete/{id}", "ControllerAnayevas@destroy2");
});
Route::resource("calificacion", "ControllerAnayevas");

//grupo de rutas con controlador PLANIFICACION
Route::group(['prefix' => 'planificacion'], function(){
                   //             // nombre controlador 
Route::get("delete/{id}", "ControllerPlanificaciones@destroy");
Route::get("deleteAli/{id}", "ControllerAlineamientos@destroy");
Route::post("store", "ControllerPlanificaciones@store");


Route::get("storeAli/{detalle}/{token}", "ControllerAlineamientos@store");
Route::get("edit/{id}", "ControllerPlanificaciones@edit");
Route::get("descargar/{id}", "ControllerPlanificaciones@Descargar");
Route::patch("edit/update/{id}", "ControllerPlanificaciones@update");
});
Route::resource("planificacion", "ControllerAlineamientos");

Route::group(['prefix' => 'equipoval'], function(){
//equipo val
Route::post("storeEquipoval", "ControllerPlanificaciones@storeEquipoval");
Route::get("delete/{id}", "ControllerPlanificaciones@destroyEquipoval");
});
Route::resource("equipoval", "ControllerPlanificaciones");

Route::resource("ejemplo","EjemploController");



//grupo de rutas con controlador PLANGESTION Y PESOXPLANGESTION
                        //prefijo o nombre q se le da al grupo
Route::group(['prefix' => 'plangestion'], function(){
                   //             // nombre controlador 
Route::get("delete/{id}", "ControllerPesoxPlangestion@destroy");
Route::get("deletePlan/{id}", "ControllerPGestiones@destroy");
Route::get("store/{detalle}/{peso}/{token}", "ControllerPesoxPlangestion@store");
Route::post("storePlan", "ControllerPGestiones@store");
Route::get("edit/{id}", 'ControllerPGestiones@edit');
Route::patch("edit/update/{id}", 'ControllerPesoxPlangestion@update');
Route::patch("edit/updatePlan/{id}", 'ControllerPGestiones@update');
});
Route::resource("plangestion", "ControllerPesoxPlangestion");

//para llamar resultados
Route::resource("reporte", "ControllerResultados");

//para el reset de la contraseña
Route::get('/users/confirmation/{token}','Auth\RegisterController@confirmation')->name('confirmation');

//para llamar a plangestionactualizar
Route::get("paginas/plangestionactualizar", function () {
    return view('paginas/plangestionactualizar');
});
//para llamar a portafolioactualizar
Route::get("paginas/portafolioactualizar", function () {
    return view('paginas/portafolioactualizar');
});

//para llamar a autoevaluacionactualizar
Route::get("paginas/autoevaluacionactualizar", function () {
    return view('paginas/autoevaluacionactualizar');
});

//para llamar a anayevaactualizar
Route::get("paginas/anayevaactualizar", function () {
    return view('paginas/anayevaactualizar');
});

//para llamar a planificacionactualizar
Route::get("paginas/planificacionactualizar", function () {
    return view('paginas/planificacionactualizar');
});
