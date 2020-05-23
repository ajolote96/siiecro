<?php

use Illuminate\Http\Request;
use App\Obras;
use App\AnalisisG;
use App\AnalisisCientifico;

Route::get('Soporte', function() {
    return view('soporte.mensaje_soporte');
})->name('soporte');

Route::get('Mensaje', 'ObrasController@mail', function() {
    
})->name('mensaje');

Route::get('/', function () {
    return view('welcome');
});
Route::get('home', function () {
    return view('home');
})->name('inicio');

Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });
    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});


// Rutas de Obras
Route::resource('Obras','ObrasController');

Route::get('index', function () {
    return view('Obras.index');
});

Route::get('Obra/Capturar', function () {
    return view('obras.create');
})->middleware('permission:Bloqueo_de_redireccion_Captura_Registro');

Route::get('Obra/{id}/editar', function ($id) {
    $obra = Obras::findOrFail($id);
    return view('obras.edit', compact('obra'));
})->name('Obras.editar')->middleware('permission:Editar_Registro_Bloqueo_Redireccion');

Route::get('Obra/{id}/ver', function ($id) {
    $obra = Obras::findOrFail($id);
    return view('obras.show', compact('obra'));
})->middleware('permission:Consulta_ruta_obras');

Route::get('Obra/{id}', function($id){
    $obra = Obras::findOrFail($id);
    $obra->delete();
    return redirect()->route('Obras.index')->with('success','Obra Eliminada.');
})->name('Obras.destroy');

Route::get('Obra/{id}/Pdf', function ($id){
    $obra = Obras::findOrFail($id);
    $pdf = PDF::loadView('Obras.imprimirpdf', compact('obra')  );
    return $pdf->stream();
})->name('Obras.pdf');

Route::put('Obra/{id}', function(Request $request, $id){
    $obra = Obras::findOrFail($id);
    $obra->id = $request->input('id');
    $obra->titulo_obra = $request->input('titulo_obra');
    $obra->temp_obra = $request->input('temp_obra');
    $obra->caract_descrip = $request->input('caract_descrip');
    $obra->año = $request->input('año');
    $obra->año_confirm = $request->input('año_confirm');
    $obra->año_aproxi = $request->input('año_aproxi');
    $obra->epoca_obra = $request->input('epoca_obra');
    $obra->epoca_confirm = $request->input('epoca_confirm');
    $obra->epoca_aproxi = $request->input('epoca_aproxi');
    $obra->tipo_bien_cultu = $request->input('tipo_bien_cultu');
    $obra->tipo_obj_obra = $request->input('tipo_obj_obra');
    $obra->lugar_proce_ori = $request->input('lugar_proce_ori');
    $obra->lugar_proce_act = $request->input('lugar_proce_act');
    $obra->no_inv_obra = $request->input('no_inv_obra');
    $obra->forma_ingreso = $request->input('forma_ingreso');
    $obra->sector_obra = $request->input('sector_obra');
    $obra->respon_ecro = $request->input('respon_ecro');
    $obra->proyecto_obra = $request->input('proyecto_obra');
    $obra->año_proyec_obra = $request->input('año_proyec_obra');
    $obra->no_proyec_obra = $request->input('no_proyec_obra');
    $obra->fecha_de_entrada = $request->input('fecha_de_entrada');
    $obra->fecha_de_salida = $request->input('fecha_de_salida');

    $obra->save();
    return redirect()->route('Obras.index')->with('success','Obra Editada.');
})->name('Obras.actualizar');


//Rutas de solicitud de analisis cientifico

Route::resource('AnalisisCientifico','AnalisisGController');
Route::get('AnalisisCientifico', function (Request $request) {
   $id_general = $request->get('id_general');
        $Analisisg = AnalisisG::orderBy('id_general', 'DESC')
        ->id($id_general)
        ->paginate(5);
        return view('analisisg.index',compact('Analisisg'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
})->name('analisisg.index')->middleware('');

Route::get('AnalisisCientifico/{id}/create', function ($id) {

        $obra = Obras::findOrFail($id);
    return view('analisisg.create', compact('obra'));
})->name('analisisg.create')->middleware('permission:');

Route::get('AnalisisCientifico/{id_general}/editar',  function ($id_general) {
    $analisisg = AnalisisG::findOrFail($id_general);
        return view('analisisg.edit', compact('analisisg'));
})->name('analisisg.editar')->middleware('');

Route::get('AnalisisCientifico/{id}', function($id){
    $analisisg = AnalisisG::findOrFail($id_general);
    $analisisg->delete();
    return redirect()->route('analisisg.index')->with('success','Solicitud Eliminada.');
})->name('analisisg.destroy');


Route::put('AnalisisCientifico/{id_general}/editar', 'AnalisisGController@update', function(Request $request, $id_general){
})->name('analisisg.actualizar');
Route::get('AnalisisCientifico/{id_general}/ver', 'AnalisisGController@show', function(Request $request, $id_general){
})->name('analisisg.show')->middleware('permission:Consulta_General');

//Rutas de registro de analisis cientifico
Route::resource('RegistroCientifico','AnalisisCientificoController');
Route::get('RegistroCientifico', 'AnalisisCientificoController@index', function (Request $request) {
})->name('registro.index')->middleware('permission:Consulta_General');
Route::get('RegistroCientifico/{id}/create', 'AnalisisCientificoController@create', function ($id) {
})->name('registro.create')->middleware('permission:Captura_Avanzada_Nivel_2');
Route::get('RegistroCientifico/ver/{idcientifico}', 'AnalisisCientificoController@show', function(Request $request, $idcientifico){
})->name('registro.show')->middleware('permission:Consulta_General');
Route::get('RegistroCientifico/{idcientifico}/editar',  function ($idcientifico ) {
    $a_cientifico = AnalisisCientifico::findOrFail($idcientifico);
        return view('registro.edit', compact('a_cientifico'));
})->name('registro.editar')->middleware('permission:');
Route::delete('RegistroCientifico/{idcientifico}',  'AnalisisCientificoController@destroy', function($idcientifico){
})->name('registro.destroy');
Route::put('RegistroCientifico/{id_general}/editar', 'AnalisisCientificoController@update', function(Request $request, $idcientifico){
})->name('registro.actualizar');
Route::get('RegistroCientifico/{id_general}/ver', 'AnalisisCientificoController@show', function(Request $request, $idcientifico){
})->name('registro.show')  ->middleware('permission:');

