<?php

namespace App\Http\Controllers;

use DB;
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
        $analisisg = DB::table('analisisg')->where('id_general', $id_general)
        ->join('soporte_solicitud', 'analisisg.id_general', '=', 'soporte_solicitud.general_id')
        ->select('analisisg.*', 'soporte_solicitud.*')
        ->get();

        $analisisgs = $analisisg;


        return view('analisisg.show', compact('analisisgs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AnalisisG  $analisisG
     * @return \Illuminate\Http\Response
     */
    public function edit(AnalisisG $analisisG, $id_general)
    {
        $analisisg = DB::table('analisisg')->where('id_general', $id_general)
        ->join('soporte_solicitud', 'analisisg.id_general', '=', 'soporte_solicitud.general_id')
        ->select('analisisg.*', 'soporte_solicitud.*')
        ->get();

        $analisisgs = $analisisg;
        return view('analisisg.edit', compact('analisisgs'));
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
        $analisisg->tipo_obj_obra = $request->input('tipo_obj_obra');
        $analisisg->respon_intervencion = $request->input('respon_intervencion');
        $analisisg->fecha_de_inicio = $request->input('fecha_de_inicio');
        if ($request->hasFile('foto')) {
        $nombre=$request->file('foto')->getClientOriginalName();
            $request->file('foto')->move('images', $nombre);
            $analisisg->foto = $nombre;
    }

        $soporte = SoportesSolicitud::where('general_id', $id_general)->get();
        $contador_soporte = 0;
        //dd($request->input("Smuestra{$contador_soporte}"));
        foreach ($soporte as $soportes) {
        $soportes->soporte_muestra = $request->input("Smuestra_edit{$contador_soporte}");
        $soportes->soporte_nomenclatura = $request->input("Snomenclatura_edit{$contador_soporte}");  
        $soportes->soporte_inf_requerida = $request->input("Sinf_requerida_edit{$contador_soporte}");
        $soportes->soporte_des_muestra = $request->input("Sdes_muestra_edit{$contador_soporte}");
        $soportes->soporte_ubicacion = $request->input("Subicacion_edit{$contador_soporte}");
        $soportes->soporte_responsable = $request->input("Sresponsable_edit{$contador_soporte}");
        $soportes->soporte_identificacion_muestra = $request->input("Siden_muestra_edit{$contador_soporte}");
        $contador_soporte +=1;
        $soportes->save();

        if ($request->has('Smuestra' . $contador_soporte)) {
            SoportesSolicitud::firstOrCreate(
                [
                    'general_id' => $analisisg->id_general, 
                    'soporte_muestra' => $request->input("Smuestra{$contador_soporte}"),
                    'soporte_nomenclatura' => $request->input("Snomenclatura{$contador_soporte}"),
                    'soporte_inf_requerida' => $request->input("Sinf_requerida{$contador_soporte}"),
                    'soporte_des_muestra' => $request->input("Sdes_muestra{$contador_soporte}"),
                    'soporte_ubicacion' => $request->input("Subicacion{$contador_soporte}"),
                    'soporte_responsable' => $request->input("Sresponsable{$contador_soporte}"),
                    'soporte_identificacion_muestra'=> $request->input("Siden_muestra{$contador_soporte}")
                ]
            );
            
            // oooo checa el método updateOrCreate, quizá y te hace las dos chambas https://laravel.com/docs/5.8/eloquent#other-creation-methods
        }            
         
         
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
