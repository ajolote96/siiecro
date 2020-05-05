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
        $request->validate([
            'id',
            'id_de_obras' => 'required',
            'titulo_obra' => 'required',
            'temp_obra',
            'caract_descrip' => 'required',
            'año',
            'año_confirm',
            'año_aproxi',
            'epoca_obra',
            'epoca_confirm',
            'epoca_aproxi',
            'tipo_bien_cultu' => 'required',
            'tipo_obj_obra' => 'required',
            'lugar_proce_ori' => 'required',
            'lugar_proce_act' => 'required',
            'no_inv_obra' => 'required',
            'forma_ingreso' => 'required',
            'sector_obra' => 'required',
            'respon_ecro',
            'proyecto_obra',
            'año_trabajo_obra',
            'no_proyec_obra',
            'temporada_trabajo',
            'fecha_de_entrada' => 'required',
            'fecha_de_salida',


            
        ]);

  
        Obras::create($request->all());
   
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
