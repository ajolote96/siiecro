<?php

namespace App\Http\Controllers;

use App\AnalisisG;
use App\Obras;
use App\SoportesSolicitud;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class AnalisisGController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index(Request $request)
    {
        $id = $request->get('id_general');
        $Analisisg = AnalisisG::orderBy('id_general', 'DESC')
        ->id($id)
        ->paginate(5);
        return view('analisisg.index',compact('Analisisg'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $id_obra = Obras::with('id')->get(); 
 //algo general...

 //enviamos los datos a la vista
    //return view('analisisg.create', compact('id_obra'));
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
            'id_general',
            'id_obra',
            'id_de_obra',
            'titulo_obra',
            'temp_obra',
            'epoca_obra',
            'tipo_obj_obra',
            'respon_intervencion',
            'fecha_de_inicio',
            'foto',
            'alto',
            'ancho',    
            'profundidad',
            'diametro',
            'tecnica',
            'analisis',
        ]);

        $analisisg = (new AnalisisG)->fill($request->all());
        
        if ($request->hasFile('foto')) {
            //$analisisg->foto = $request->file('foto')->store('public');

            $nombre=$request->file('foto')->getClientOriginalName();
            $request->file('foto')->move('images', $nombre);
            $analisisg->foto = $nombre;
        }
        
        
        
            
        
        if ($analisisg->save()) {
            for ($counters=0; $counters < 7 ; $counters++) { 
                $obtener_id = AnalisisG::latest('id_general')->first();
                if ($request->has("Smuestra{$counters}")) {
                    SoportesSolicitud::create(['general_id' => $analisisg->id_general, 'soporte_muestra' => $request->get("Smuestra{$counters}"),'soporte_nomenclatura' => $request->get("Snomenclatura{$counters}"),
                        'soporte_inf_requerida' => $request->get("Sinf_requerida{$counters}"),
                        'soporte_des_muestra' => $request->get("Sdes_muestra{$counters}"),
                        'soporte_ubicacion' => $request->get("Subicacion{$counters}"),
                        'soporte_responsable' => $request->get("Sresponsable{$counters}"),
                        'soporte_identificacion_muestra'=> $request->get("Siden_muestra{$counters}")]);
                }else{
                    break;
                }
            }
        }  
   
       return redirect()->route('analisisg.index')
                        ->with('success','Ficha Creada Exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AnalisisG  $analisisG
     * @return \Illuminate\Http\Response
     */
    public function show(AnalisisG $analisisG, $id_general)
    {
        $analisisg = AnalisisG::findOrFail($id_general);
        return view('analisisg.show', compact('analisisg'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AnalisisG  $analisisG
     * @return \Illuminate\Http\Response
     */
    public function edit(AnalisisG $analisisG, $id_general)
    {
        $analisisg = AnalisisG::findOrFail($id_general);
        return view('analisisg.edit', compact('analisisg'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AnalisisG  $analisisG
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_general)
    {
        $analisisg = AnalisisG::findOrFail($id_general);
        $analisisg->id_obra = $request->input('id_obra');
        $analisisg->id_de_obra = $request->input('id_de_obra');
        $analisisg->titulo_obra = $request->input('titulo_obra');
        $analisisg->temp_obra = $request->input('temp_obra');
        $analisisg->epoca_obra = $request->input('epoca_obra');
        $analisisg->tipo_bien_cultu = $request->input('tipo_bien_cultu');
        $analisisg->tipo_obj_obra = $request->input('tipo_obj_obra');
        $analisisg->lugar_proce_ori = $request->input('lugar_proce_ori');
        $analisisg->lugar_proce_act = $request->input('lugar_proce_act');
        $analisisg->no_inv_obra = $request->input('no_inv_obra');
        $analisisg->respon_intervencion = $request->input('respon_intervencion');
        $analisisg->proyecto_obra = $request->input('proyecto_obra');
        $analisisg->año_proyec_obra = $request->input('año_proyec_obra');
        $analisisg->fecha_de_inicio = $request->input('fecha_de_inicio');
        if ($request->hasFile('foto')) {
        $nombre=$request->file('foto')->getClientOriginalName();
            $request->file('foto')->move('images', $nombre);
            $analisisg->foto = $nombre;
    }

    $analisisg->save();
    return redirect()->route('analisisg.index')->with('success','Solicitud Editada.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AnalisisG  $analisisG
     * @return \Illuminate\Http\Response
     */
    public function destroy(AnalisisG $analisisG, $id_general)
    {
        $analisisg = AnalisisG::findOrFail($id_general);
    $analisisg->delete();
    return redirect()->route('analisisg.index')->with('success','Solicitud Eliminada.');
    }
}
