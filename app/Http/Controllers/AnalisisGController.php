<?php

namespace App\Http\Controllers;

use DB;
use App\AnalisisG;
use App\Obras;
use App\SoportesSolicitud;
use App\base_solicitud;
use App\EstratigrafiaSolicitud;
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
        
        
        
            
        //dd($request->all());
        if ($analisisg->save()) {

            //Agregar SOPORTE

            for ($counters=0; $counters < 7 ; $counters++) { 
                $obtener_id = AnalisisG::latest('id_general')->first();
                if ($request->get("Smuestra{$counters}") != NULL) {

                    if ($request->has("Smuestra{$counters}")) {
                        SoportesSolicitud::create([
                            'general_id' => $analisisg->id_general,
                            'soporte_muestra' => $request->get("Smuestra{$counters}"),
                            'soporte_nomenclatura' => $request->get("Snomenclatura{$counters}"),
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

            //Agregar BASE PREPARACION

             for ($counters=0; $counters < 7 ; $counters++) { 
                if ($request->get("BPmuestra{$counters}") != NULL) {
                    if ($request->has("BPmuestra{$counters}")) {
                        base_solicitud::create([
                            'general_id' => $analisisg->id_general, 
                            'base_muestra' => $request->get("BPmuestra{$counters}"),
                            'base_nomenclatura' => $request->get("BPnomenclatura{$counters}"),
                            'base_inf_requerida' => $request->get("BPinf_requerida{$counters}"),
                            'base_des_muestra' => $request->get("BPdes_muestra{$counters}"),
                            'base_ubicacion' => $request->get("BPubicacion{$counters}"),
                            'base_responsable' => $request->get("BPresponsable{$counters}"),
                            'base_identificacion_muestra'=> $request->get("BPiden_muestra{$counters}")]);
                    }else{
                        break;
                    }
                }
            }

            //Agregar ESTRATIGRAFIA

            for ($counters=0; $counters < 7 ; $counters++) { 
                if ($request->get("Emuestra{$counters}") != NULL) {
                    if ($request->has("Emuestra{$counters}")) {
                        EstratigrafiaSolicitud::create([
                            'general_id' => $analisisg->id_general, 
                            'estratigrafia_muestra' => $request->get("Emuestra{$counters}"),
                            'estratigrafia_nomenclatura' => $request->get("Enomenclatura{$counters}"),
                            'estratigrafia_inf_requerida' => $request->get("Einf_requerida{$counters}"),
                            'estratigrafia_des_muestra' => $request->get("Edes_muestra{$counters}"),
                            'estratigrafia_ubicacion' => $request->get("Eubicacion{$counters}"),
                            'estratigrafia_responsable' => $request->get("Eresponsable{$counters}"),
                            'estratigrafia_identificacion_muestra'=> $request->get("Eiden_muestra{$counters}")]);
                    }else{
                        break;
                    }
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
        ->select('analisisg.*')
        ->get();
        $soportes = DB::table('soporte_solicitud')->where('general_id', $id_general)
        ->select('soporte_solicitud.*')
        ->get();
        $baseP = DB::table('base_solicituds')->where('general_id', $id_general)
        ->select('base_solicituds.*')
        ->get();
        $estratigrafia = DB::table('estratigrafia_solicitud')->where('general_id', $id_general)
        ->select('estratigrafia_solicitud.*')
        ->get();
        
        


        $analisisgs = $analisisg;

        //dd($analisisgs);

        return view('analisisg.show', compact('analisisgs','soportes','baseP','estratigrafia'));
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
        ->select('analisisg.*')
        ->get();
        $soportes = DB::table('soporte_solicitud')->where('general_id', $id_general)
        ->select('soporte_solicitud.*')
        ->get();
        $baseP = DB::table('base_solicituds')->where('general_id', $id_general)
        ->select('base_solicituds.*')
        ->get();
        $estratigrafia = DB::table('estratigrafia_solicitud')->where('general_id', $id_general)
        ->select('estratigrafia_solicitud.*')
        ->get();

        $analisisgs = $analisisg;
        
        return view('analisisg.edit', compact('analisisgs','soportes','baseP','estratigrafia'));
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
        $baseP = base_solicitud::where('general_id', $id_general)->get();
        $estratigrafia = EstratigrafiaSolicitud::where('general_id', $id_general)->get();
        $contador_soporte = 0;
        $contador_base = 0;
        $contador_estratigrafia =0;

        //dd($request->input("Smuestra{$contador_soporte}"));

        //SOPORTE
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
        }       
    }
    // BASE PREPARACION
        foreach ($baseP as $basesP) {
        $basesP->base_muestra = $request->input("BPmuestra_edit{$contador_base}");
        $basesP->base_nomenclatura = $request->input("BPnomenclatura_edit{$contador_base}");  
        $basesP->base_inf_requerida = $request->input("BPinf_requerida_edit{$contador_base}");
        $basesP->base_des_muestra = $request->input("BPdes_muestra_edit{$contador_base}");
        $basesP->base_ubicacion = $request->input("BPubicacion_edit{$contador_base}");
        $basesP->base_responsable = $request->input("BPresponsable_edit{$contador_base}");
        $basesP->base_identificacion_muestra = $request->input("BPiden_muestra_edit{$contador_base}");
        $contador_base +=1;
        $basesP->save();

        if ($request->has('BPmuestra' . $contador_base)) {
            base_solicitud::firstOrCreate(
                [
                    'general_id' => $analisisg->id_general, 
                    'base_muestra' => $request->get("BPmuestra{$contador_base}"),
                    'base_nomenclatura' => $request->get("BPnomenclatura{$contador_base}"),
                    'base_inf_requerida' => $request->get("BPinf_requerida{$contador_base}"),
                    'base_des_muestra' => $request->get("BPdes_muestra{$contador_base}"),
                    'base_ubicacion' => $request->get("BPubicacion{$contador_base}"),
                    'base_responsable' => $request->get("BPresponsable{$contador_base}"),
                    'base_identificacion_muestra'=> $request->get("BPiden_muestra{$contador_base}")
                ]
            );
        }       
    }

    //ESTRATIGRAFIA

    foreach ($estratigrafia as $estratigrafias) {
        $estratigrafias->estratigrafia_muestra = $request->input("Emuestra_edit{$contador_estratigrafia}");
        $estratigrafias->estratigrafia_nomenclatura = $request->input("Enomenclatura_edit{$contador_estratigrafia}");  
        $estratigrafias->estratigrafia_inf_requerida = $request->input("Einf_requerida_edit{$contador_estratigrafia}");
        $estratigrafias->estratigrafia_des_muestra = $request->input("Edes_muestra_edit{$contador_estratigrafia}");
        $estratigrafias->estratigrafia_ubicacion = $request->input("Eubicacion_edit{$contador_estratigrafia}");
        $estratigrafias->estratigrafia_responsable = $request->input("Eresponsable_edit{$contador_estratigrafia}");
        $estratigrafias->estratigrafia_identificacion_muestra = $request->input("Eiden_muestra_edit{$contador_estratigrafia}");
        $contador_estratigrafia +=1;
        $estratigrafias->save();

        if ($request->has('Emuestra' . $contador_estratigrafia)) {
            EstratigrafiaSolicitud::firstOrCreate(
                [
                    'general_id' => $analisisg->id_general, 
                    'estratigrafia_muestra' => $request->get("Emuestra{$contador_estratigrafia}"),
                    'estratigrafia_nomenclatura' => $request->get("Enomenclatura{$contador_estratigrafia}"),
                    'estratigrafia_inf_requerida' => $request->get("Einf_requerida{$contador_estratigrafia}"),
                    'estratigrafia_des_muestra' => $request->get("Edes_muestra{$contador_estratigrafia}"),
                    'estratigrafia_ubicacion' => $request->get("Eubicacion{$contador_estratigrafia}"),
                    'estratigrafia_responsable' => $request->get("Eresponsable{$contador_estratigrafia}"),
                    'estratigrafia_identificacion_muestra'=> $request->get("Eiden_muestra{$contador_estratigrafia}")
                ]
            );
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
