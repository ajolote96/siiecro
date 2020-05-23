<?php

namespace App\Http\Controllers;

use App\Obras;
use App\AnalisisG;
use Illuminate\Http\Request;

class ObrasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
public function mail(Request $request)
{
    //Llamando a los campos
$nombre= $_POST['nombre'];
$correo= $_POST['correo'];
$telefono= $_POST['telefono'];
$mensaje= $_POST['mensaje'];


// Datos para el correo
$destinatario ="tonatiuhgarciarios@gmail.com";
$asunto="Contacto desde nuestra web";


$carta="De: $nombre\n" ;
$carta .="Correo: $correo\n";
$carta .="Telefono: $telefono\n";
$carta .="Mensaje: $mensaje";


//Enviando mensaje
mail($destinatario, $asunto, $carta);
header('Location:mensaje_de_envio.html');
}

public function attribute()
{
    return [
        'titulo_obra' => 'Titulo de la obra',
        'temp_obra' => 'Temporada de la obra',
        'caract_descrip' => 'Caracteristicas descriptivas',
        'tipo_bien_cultu' => 'Tipo de bien cultural',
        'tipo_obj_obra' => 'Tipo de objeto de la obra',
        'lugar_proce_ori' => 'Lugar de procedencia original',
        'lugar_proce_act' => 'Lugar de procedencia actual',
        'no_inv_obra' => 'Numero de inventario de la obra',
        'forma_ingreso' => 'Forma de ingreso',
        'sector_obra' => 'Sector de la obra',
        'respon_ecro' => 'Responsable de la ECRO',
        'proyecto_obra' => 'Proyecto de la obra',
        'año_proyec_obra' => 'Año de proyectod e la obra',
        'no_proyec_obra' => 'Numero de proyecto de la obra',
    ];
}
    public function index(Request $request)
    {
        $id = $request->get('id');
        $Obras = Obras::orderBy('id', 'DESC')
        ->id($id)
        ->paginate(5);
        return view('obras.index',compact('Obras'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('obras.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
        $request->validate([
            'id',
            'id_de_obras',
            'titulo_obra' => 'required',
            'temp_obra',
            'caract_descrip',
            'año',
            'año_confirm',
            'año_aproxi',
            'cultura',
            'autor',
            'epoca_obra',
            'epoca_confirm',
            'epoca_aproxi',
            'tipo_bien_cultu' => 'required',
            'tipo_obj_obra' => 'required',
            'lugar_proce_ori',
            'lugar_proce_act',
            'no_inv_obra',
            'forma_ingreso'=> 'required',
            'sector_obra' => 'required',
            'respon_ecro' => 'required',
            'proyecto_obra',
            'año_trabajo_obra',
            'no_proyec_obra',
            'temporada_trabajo',
            'fecha_de_entrada' => 'required',
            'fecha_de_salida',


            
        ]);

$data = array(
array(
        'autor' => $request->input('autor')
       ),
    array(
         'autor' => $request->input('autor2')
       ),
);



  $obra = new Obras;
    $obra->id = $obra->id;
    $obra->id_de_obras = $request->input('id_de_obras');
    $obra->titulo_obra = $request->input('titulo_obra');
    if ($request->temporalidadotro == NULL) {
        $obra->temp_obra = $request->input('temp_obra');
    }else
    {
        $obra->temp_obra = $request->input('temporalidadotro');
    }
    
    $obra->caract_descrip = $request->input('caract_descrip');
    $obra->año = $request->input('año');
    $obra->autor = $data;
    $obra->cultura = $request->input('cultura');
    $obra->año_confirm = $request->input('año_confirm');
    $obra->año_aproxi = $request->input('año_aproxi');
     if ($request->epocaobraotro == NULL) {
        $obra->epoca_obra = $request->input('epoca_obra');
    }else
    {
        $obra->epoca_obra = $request->input('epocaobraotro');
    }
    
    $obra->epoca_confirm = $request->input('epoca_confirm');
    $obra->epoca_aproxi = $request->input('epoca_aproxi');
    if ($request->tipobotro == NULL) {
        $obra->tipo_bien_cultu = $request->input('tipo_bien_cultu');
    }else
    {
        $obra->tipo_bien_cultu = $request->input('tipobotro');
    }

    if ($request->tipoobjetootro == NULL) {
        $obra->tipo_obj_obra = $request->input('tipo_obj_obra');
    }else
    {
        $obra->tipo_obj_obra = $request->input('tipoobjetootro');
    }
    
    $obra->lugar_proce_ori = $request->input('lugar_proce_ori');
    $obra->lugar_proce_act = $request->input('lugar_proce_act');
    $obra->no_inv_obra = $request->input('no_inv_obra');
    $obra->forma_ingreso = $request->input('forma_ingreso');

     if ($request->sectorobraotro == NULL) {
        $obra->sector_obra = $request->input('sector_obra');
    }else
    {
        $obra->sector_obra = $request->input('sectorobraotro');
    }

    $obra->respon_ecro = $request->input('respon_ecro');
    $obra->proyecto_obra = $request->input('proyecto_obra');
    $obra->año_trabajo_obra = $request->input('año_trabajo_obra');
    $obra->no_proyec_obra = $request->input('no_proyec_obra');
    $obra->fecha_de_entrada = $request->input('fecha_de_entrada');
    $obra->fecha_de_salida = $request->input('fecha_de_salida');

//dd($obra, $request->all());
    $obra->save();
        //Obras::create($request->all());
   
        return redirect()->route('Obras.index')
                        ->with('success','Obra Creada Exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Obras  $obras
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $obra = Obras::findOrFail($id);
        return view('Obras.show', compact('obra'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Obras  $obras
     * @return \Illuminate\Http\Response
     */
    public function edit(Obras $Obras)
    {
        //return view('Obras.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Obras  $obras
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Obras $Obras)
    {

        $request->validate([
            'id' => 'required',
            'titulo_obra' => 'required',
            'temp_obra' => 'required',
            'caract_descrip' => 'required',
            'año',
            'año_confirm',
            'año_aproxi',
            'epoca_obra',
            'epoca_confirm',
            'epoca_aproxi',
            'tipo_bien_cultu',
            'tipo_obj_obra',
            'lugar_proce_ori',
            'lugar_proce_act',
            'no_inv_obra',
            'forma_ingreso',
            'sector_obra',
            'respon_ecro',
            'proyecto_obra',
            'año_trabajo_obra',
            'no_proyec_obra',
            'fecha_de_entrada' ,
            'fecha_de_salida',
            
        ]);
  
        $Obras->update($request->all());
  
        return redirect()->route('Obras.index')
                        ->with('success','Obras Actualizadas');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Obras  $obras
     * @return \Illuminate\Http\Response
     */
    public function borrar(Obras $id)
    {
         
         Obras::destroy($id);
         //$id->delete();
         //$Obras = Obras::find($id);
       
  
        return view('Obras.index');
                        //->with('success','Obra Eliminada.');
    }
    public function destroy(Request $id)
    {
        /* $Obras = Obras::findOrFail($id->id);
  $Obras->delete();
 
  return redirect()->route('Obras.index');*/
        // $id->delete();
         /*$Obras = Obras::find($id);
       
  
        return redirect()->route('Obras.index')
                        ->with('success','Obra Eliminada.');*/
    }
}
