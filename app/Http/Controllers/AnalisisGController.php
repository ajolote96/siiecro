<?php

namespace App\Http\Controllers;

use DB;
use App\AnalisisG;
use App\Obras;
use App\SoportesSolicitud;
use App\base_solicitud;
use App\EstratigrafiaSolicitud;
use App\RevoqueSolicitud;
use App\BolSolicitud;
use App\LaminasSolicitud;
use App\PigmentosSolicitud;
use App\AglutinantesSolicitud;
use App\RecubrimientosSolicitud;
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
        ->paginate(10);
        return view('analisisg.index',compact('Analisisg'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
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

            // AGREGAR REVOQUE

            for ($counters=0; $counters < 7 ; $counters++) { 
                if ($request->get("REmuestra{$counters}") != NULL) {
                    if ($request->has("REmuestra{$counters}")) {
                        RevoqueSolicitud::create([
                            'general_id' => $analisisg->id_general, 
                            'revoque_muestra' => $request->get("REmuestra{$counters}"),
                            'revoque_nomenclatura' => $request->get("REnomenclatura{$counters}"),
                            'revoque_inf_requerida' => $request->get("REinf_requerida{$counters}"),
                            'revoque_des_muestra' => $request->get("REdes_muestra{$counters}"),
                            'revoque_ubicacion' => $request->get("REubicacion{$counters}"),
                            'revoque_responsable' => $request->get("REresponsable{$counters}"),
                            'revoque_identificacion_muestra'=> $request->get("REiden_muestra{$counters}")]);
                    }else{
                        break;
                    }
                }
            }

            //AGREGAR BOL

            for ($counters=0; $counters < 7 ; $counters++) { 
                if ($request->get("BOLmuestra{$counters}") != NULL) {
                    if ($request->has("BOLmuestra{$counters}")) {
                        BolSolicitud::create([
                            'general_id' => $analisisg->id_general, 
                            'bol_muestra' => $request->get("BOLmuestra{$counters}"),
                            'bol_nomenclatura' => $request->get("BOLnomenclatura{$counters}"),
                            'bol_inf_requerida' => $request->get("BOLinf_requerida{$counters}"),
                            'bol_des_muestra' => $request->get("BOLdes_muestra{$counters}"),
                            'bol_ubicacion' => $request->get("BOLubicacion{$counters}"),
                            'bol_responsable' => $request->get("BOLresponsable{$counters}"),
                            'bol_identificacion_muestra'=> $request->get("BOLiden_muestra{$counters}")]);
                    }else{
                        break;
                    }
                }
            }

            // LAMINAS METALICAS

            for ($counters=0; $counters < 7 ; $counters++) { 
                if ($request->get("LMmuestra{$counters}") != NULL) {
                    if ($request->has("LMmuestra{$counters}")) {
                        LaminasSolicitud::create([
                            'general_id' => $analisisg->id_general, 
                            'laminas_muestra' => $request->get("LMmuestra{$counters}"),
                            'laminas_nomenclatura' => $request->get("LMnomenclatura{$counters}"),
                            'laminas_inf_requerida' => $request->get("LMinf_requerida{$counters}"),
                            'laminas_des_muestra' => $request->get("LMdes_muestra{$counters}"),
                            'laminas_ubicacion' => $request->get("LMubicacion{$counters}"),
                            'laminas_responsable' => $request->get("LMresponsable{$counters}"),
                            'laminas_identificacion_muestra'=> $request->get("LMiden_muestra{$counters}")]);
                    }else{
                        break;
                    }
                }
            }

            // PIGMENTOS

            for ($counters=0; $counters < 7 ; $counters++) { 
                if ($request->get("Pmuestra{$counters}") != NULL) {
                    if ($request->has("Pmuestra{$counters}")) {
                        PigmentosSolicitud::create([
                            'general_id' => $analisisg->id_general, 
                            'pigmentos_muestra' => $request->get("Pmuestra{$counters}"),
                            'pigmentos_nomenclatura' => $request->get("Pnomenclatura{$counters}"),
                            'pigmentos_inf_requerida' => $request->get("Pinf_requerida{$counters}"),
                            'pigmentos_des_muestra' => $request->get("Pdes_muestra{$counters}"),
                            'pigmentos_ubicacion' => $request->get("Pubicacion{$counters}"),
                            'pigmentos_responsable' => $request->get("Presponsable{$counters}"),
                            'pigmentos_identificacion_muestra'=> $request->get("Piden_muestra{$counters}")]);
                    }else{
                        break;
                    }
                }
            }

            // AGLUTINANTES

            for ($counters=0; $counters < 7 ; $counters++) { 
                if ($request->get("Amuestra{$counters}") != NULL) {
                    if ($request->has("Amuestra{$counters}")) {
                        AglutinantesSolicitud::create([
                            'general_id' => $analisisg->id_general, 
                            'aglutinante_muestra' => $request->get("Amuestra{$counters}"),
                            'aglutinante_nomenclatura' => $request->get("Anomenclatura{$counters}"),
                            'aglutinante_inf_requerida' => $request->get("Ainf_requerida{$counters}"),
                            'aglutinante_des_muestra' => $request->get("Ades_muestra{$counters}"),
                            'aglutinante_ubicacion' => $request->get("Aubicacion{$counters}"),
                            'aglutinante_responsable' => $request->get("Aresponsable{$counters}"),
                            'aglutinante_identificacion_muestra'=> $request->get("Aiden_muestra{$counters}")]);
                        }else{
                        break;
                    }
                }
            }

            // RECUBRIMIENTOS
            
            for ($counters=0; $counters < 7 ; $counters++) { 
                if ($request->get("Rmuestra{$counters}") != NULL) {
                    if ($request->has("Rmuestra{$counters}")) {
                        RecubrimientosSolicitud::create([
                            'general_id' => $analisisg->id_general, 
                            'recubrimiento_muestra' => $request->get("Rmuestra{$counters}"),
                            'recubrimiento_nomenclatura' => $request->get("Rnomenclatura{$counters}"),
                            'recubrimiento_inf_requerida' => $request->get("Rinf_requerida{$counters}"),
                            'recubrimiento_des_muestra' => $request->get("Rdes_muestra{$counters}"),
                            'recubrimiento_ubicacion' => $request->get("Rubicacion{$counters}"),
                            'recubrimiento_responsable' => $request->get("Rresponsable{$counters}"),
                            'recubrimiento_identificacion_muestra'=> $request->get("Riden_muestra{$counters}")]);
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
        $revoque = DB::table('revoque_solicitud')->where('general_id', $id_general)
        ->select('revoque_solicitud.*')
        ->get();
        $bol = DB::table('bol_solicitud')->where('general_id', $id_general)
        ->select('bol_solicitud.*')
        ->get();
        $lamina = DB::table('laminas_solicitud')->where('general_id', $id_general)
        ->select('laminas_solicitud.*')
        ->get();
        $pigmento = DB::table('pigmentos_solicitud')->where('general_id', $id_general)
        ->select('pigmentos_solicitud.*')
        ->get();
        $aglutinante = DB::table('aglutinante_solicitud')->where('general_id', $id_general)
        ->select('aglutinante_solicitud.*')
        ->get();
        $recubrimiento = DB::table('recubrimiento_solicitud')->where('general_id', $id_general)
        ->select('recubrimiento_solicitud.*')
        ->get();
        
        


        $analisisgs = $analisisg;

        //dd($analisisgs);

        return view('analisisg.show', compact('analisisgs','soportes','baseP','estratigrafia','revoque','bol',
            'lamina','pigmento','aglutinante','recubrimiento'));
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
        $revoque = DB::table('revoque_solicitud')->where('general_id', $id_general)
        ->select('revoque_solicitud.*')
        ->get();
        $bol = DB::table('bol_solicitud')->where('general_id', $id_general)
        ->select('bol_solicitud.*')
        ->get();
        $lamina = DB::table('laminas_solicitud')->where('general_id', $id_general)
        ->select('laminas_solicitud.*')
        ->get();
        $pigmento = DB::table('pigmentos_solicitud')->where('general_id', $id_general)
        ->select('pigmentos_solicitud.*')
        ->get();
        $aglutinante = DB::table('aglutinante_solicitud')->where('general_id', $id_general)
        ->select('aglutinante_solicitud.*')
        ->get();
        $recubrimiento = DB::table('recubrimiento_solicitud')->where('general_id', $id_general)
        ->select('recubrimiento_solicitud.*')
        ->get();

        $analisisgs = $analisisg;
        
        return view('analisisg.edit', compact('analisisgs','soportes','baseP','estratigrafia','revoque','bol',
            'lamina','pigmento','aglutinante','recubrimiento'));
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

        //CONSULTAS
        $soporte = SoportesSolicitud::where('general_id', $id_general)->get();
        $baseP = base_solicitud::where('general_id', $id_general)->get();
        $estratigrafia = EstratigrafiaSolicitud::where('general_id', $id_general)->get();
        $revoque = RevoqueSolicitud::where('general_id', $id_general)->get();
        $bol = BolSolicitud::where('general_id', $id_general)->get();
        $lamina = LaminasSolicitud::where('general_id', $id_general)->get();
        $pigmento = PigmentosSolicitud::where('general_id', $id_general)->get();
        $aglutinante = AglutinantesSolicitud::where('general_id', $id_general)->get();
        $recubrimiento = RecubrimientosSolicitud::where('general_id', $id_general)->get();

        //CONTADORES
        $contador_soporte = 0;
        $contador_base = 0;
        $contador_estratigrafia =0;
        $contador_revoque = 0;
        $contador_bol = 0;
        $contador_laminas = 0;
        $contador_pigmentos = 0;
        $contador_aglutinante = 0;
        $contador_recubrimiento = 0;

        //dd($request->all());

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

    //REVOQUE

     foreach ($revoque as $revoques) {
        $revoques->revoque_muestra = $request->input("REmuestra_edit{$contador_revoque}");
        $revoques->revoque_nomenclatura = $request->input("REnomenclatura_edit{$contador_revoque}");  
        $revoques->revoque_inf_requerida = $request->input("REinf_requerida_edit{$contador_revoque}");
        $revoques->revoque_des_muestra = $request->input("REdes_muestra_edit{$contador_revoque}");
        $revoques->revoque_ubicacion = $request->input("REubicacion_edit{$contador_revoque}");
        $revoques->revoque_responsable = $request->input("REresponsable_edit{$contador_revoque}");
        $revoques->revoque_identificacion_muestra = $request->input("REiden_muestra_edit{$contador_revoque}");
        $contador_revoque +=1;
        $revoques->save();

        if ($request->has('REmuestra' . $contador_revoque)) {
            RevoqueSolicitud::firstOrCreate(
                [
                    'general_id' => $analisisg->id_general, 
                    'revoque_muestra' => $request->get("REmuestra{$contador_revoque}"),
                    'revoque_nomenclatura' => $request->get("REnomenclatura{$contador_revoque}"),
                    'revoque_inf_requerida' => $request->get("REinf_requerida{$contador_revoque}"),
                    'revoque_des_muestra' => $request->get("REdes_muestra{$contador_revoque}"),
                    'revoque_ubicacion' => $request->get("REubicacion{$contador_revoque}"),
                    'revoque_responsable' => $request->get("REresponsable{$contador_revoque}"),
                    'revoque_identificacion_muestra'=> $request->get("REiden_muestra{$contador_revoque}")
                ]
            );
        }       
    }

    // BOL

    foreach ($bol as $bols) {
        $bols->bol_muestra = $request->input("BOLmuestra_edit{$contador_bol}");
        $bols->bol_nomenclatura = $request->input("BOLnomenclatura_edit{$contador_bol}");  
        $bols->bol_inf_requerida = $request->input("BOLinf_requerida_edit{$contador_bol}");
        $bols->bol_des_muestra = $request->input("BOLdes_muestra_edit{$contador_bol}");
        $bols->bol_ubicacion = $request->input("BOLubicacion_edit{$contador_bol}");
        $bols->bol_responsable = $request->input("BOLresponsable_edit{$contador_bol}");
        $bols->bol_identificacion_muestra = $request->input("BOLiden_muestra_edit{$contador_bol}");
        $contador_bol +=1;
        $bols->save();

        if ($request->has('BOLmuestra' . $contador_bol)) {
            BolSolicitud::firstOrCreate(
                [
                    'general_id' => $analisisg->id_general, 
                    'bol_muestra' => $request->get("BOLmuestra{$contador_bol}"),
                    'bol_nomenclatura' => $request->get("BOLnomenclatura{$contador_bol}"),
                    'bol_inf_requerida' => $request->get("BOLinf_requerida{$contador_bol}"),
                    'bol_des_muestra' => $request->get("BOLdes_muestra{$contador_bol}"),
                    'bol_ubicacion' => $request->get("BOLubicacion{$contador_bol}"),
                    'bol_responsable' => $request->get("BOLresponsable{$contador_bol}"),
                    'bol_identificacion_muestra'=> $request->get("BOLiden_muestra{$contador_bol}")
                ]
            );
        }       
    }

    //LAMINAS METALICAS

     foreach ($lamina as $laminas) {
        $laminas->laminas_muestra = $request->input("LMmuestra_edit{$contador_laminas}");
        $laminas->laminas_nomenclatura = $request->input("LMnomenclatura_edit{$contador_laminas}");  
        $laminas->laminas_inf_requerida = $request->input("LMinf_requerida_edit{$contador_laminas}");
        $laminas->laminas_des_muestra = $request->input("LMdes_muestra_edit{$contador_laminas}");
        $laminas->laminas_ubicacion = $request->input("LMubicacion_edit{$contador_laminas}");
        $laminas->laminas_responsable = $request->input("LMresponsable_edit{$contador_laminas}");
        $laminas->laminas_identificacion_muestra = $request->input("LMiden_muestra_edit{$contador_laminas}");
        $contador_laminas +=1;
        $laminas->save();

        if ($request->has('LMmuestra' . $contador_laminas)) {
            LaminasSolicitud::firstOrCreate(
                [
                    'general_id' => $analisisg->id_general, 
                    'laminas_muestra' => $request->get("LMmuestra{$contador_laminas}"),
                    'laminas_nomenclatura' => $request->get("LMnomenclatura{$contador_laminas}"),
                    'laminas_inf_requerida' => $request->get("LMinf_requerida{$contador_laminas}"),
                    'laminas_des_muestra' => $request->get("LMdes_muestra{$contador_laminas}"),
                    'laminas_ubicacion' => $request->get("LMubicacion{$contador_laminas}"),
                    'laminas_responsable' => $request->get("LMresponsable{$contador_laminas}"),
                    'laminas_identificacion_muestra'=> $request->get("LMiden_muestra{$contador_laminas}")
                ]
            );
        }       
    }

    //PIGMENTOS

    foreach ($pigmento as $pigmentos) {
        $pigmentos->pigmentos_muestra = $request->input("Pmuestra_edit{$contador_pigmentos}");
        $pigmentos->pigmentos_nomenclatura = $request->input("Pnomenclatura_edit{$contador_pigmentos}");  
        $pigmentos->pigmentos_inf_requerida = $request->input("Pinf_requerida_edit{$contador_pigmentos}");
        $pigmentos->pigmentos_des_muestra = $request->input("Pdes_muestra_edit{$contador_pigmentos}");
        $pigmentos->pigmentos_ubicacion = $request->input("Pubicacion_edit{$contador_pigmentos}");
        $pigmentos->pigmentos_responsable = $request->input("Presponsable_edit{$contador_pigmentos}");
        $pigmentos->pigmentos_identificacion_muestra = $request->input("Piden_muestra_edit{$contador_pigmentos}");
        $contador_pigmentos +=1;
        $pigmentos->save();

        if ($request->has('Pmuestra' . $contador_pigmentos)) {
            PigmentosSolicitud::firstOrCreate(
                [
                    'general_id' => $analisisg->id_general, 
                    'pigmentos_muestra' => $request->get("Pmuestra{$contador_pigmentos}"),
                    'pigmentos_nomenclatura' => $request->get("Pnomenclatura{$contador_pigmentos}"),
                    'pigmentos_inf_requerida' => $request->get("Pinf_requerida{$contador_pigmentos}"),
                    'pigmentos_des_muestra' => $request->get("Pdes_muestra{$contador_pigmentos}"),
                    'pigmentos_ubicacion' => $request->get("Pubicacion{$contador_pigmentos}"),
                    'pigmentos_responsable' => $request->get("Presponsable{$contador_pigmentos}"),
                    'pigmentos_identificacion_muestra'=> $request->get("Piden_muestra{$contador_pigmentos}")
                ]
            );
        }       
    }

    //AGLUTINANTES

    foreach ($aglutinante as $aglutinantes) {
        $aglutinantes->aglutinante_muestra = $request->input("Amuestra_edit{$contador_aglutinante}");
        $aglutinantes->aglutinante_nomenclatura = $request->input("Anomenclatura_edit{$contador_aglutinante}");  
        $aglutinantes->aglutinante_inf_requerida = $request->input("Ainf_requerida_edit{$contador_aglutinante}");
        $aglutinantes->aglutinante_des_muestra = $request->input("Ades_muestra_edit{$contador_aglutinante}");
        $aglutinantes->aglutinante_ubicacion = $request->input("Aubicacion_edit{$contador_aglutinante}");
        $aglutinantes->aglutinante_responsable = $request->input("Aresponsable_edit{$contador_aglutinante}");
        $aglutinantes->aglutinante_identificacion_muestra = $request->input("Aiden_muestra_edit{$contador_aglutinante}");
        $contador_aglutinante +=1;
        $aglutinantes->save();

        if ($request->has('Amuestra' . $contador_aglutinante)) {
            AglutinantesSolicitud::firstOrCreate(
                [
                    'general_id' => $analisisg->id_general, 
                    'aglutinante_muestra' => $request->get("Amuestra{$contador_aglutinante}"),
                    'aglutinante_nomenclatura' => $request->get("Anomenclatura{$contador_aglutinante}"),
                    'aglutinante_inf_requerida' => $request->get("Ainf_requerida{$contador_aglutinante}"),
                    'aglutinante_des_muestra' => $request->get("Ades_muestra{$contador_aglutinante}"),
                    'aglutinante_ubicacion' => $request->get("Aubicacion{$contador_aglutinante}"),
                    'aglutinante_responsable' => $request->get("Aresponsable{$contador_aglutinante}"),
                    'aglutinante_identificacion_muestra'=> $request->get("Aiden_muestra{$contador_aglutinante}")
                ]
            );
        }       
    }

    //RECUBRIOMIENTOS

    foreach ($recubrimiento as $recubrimientos) {
        $recubrimientos->recubrimiento_muestra = $request->input("Rmuestra_edit{$contador_recubrimiento}");
        $recubrimientos->recubrimiento_nomenclatura = $request->input("Rnomenclatura_edit{$contador_recubrimiento  }");  
        $recubrimientos->recubrimiento_inf_requerida = $request->input("Rinf_requerida_edit{$contador_recubrimiento}");
        $recubrimientos->recubrimiento_des_muestra = $request->input("Rdes_muestra_edit{$contador_recubrimiento}");
        $recubrimientos->recubrimiento_ubicacion = $request->input("Rubicacion_edit{$contador_recubrimiento}");
        $recubrimientos->recubrimiento_responsable = $request->input("Rresponsable_edit{$contador_recubrimiento}");
        $recubrimientos->recubrimiento_identificacion_muestra = $request->input("Riden_muestra_edit{$contador_recubrimiento}");
        $contador_recubrimiento +=1;
        $recubrimientos->save();

        if ($request->has('Rmuestra' . $contador_recubrimiento )) {
            RecubrimientosSolicitud::firstOrCreate(
                [
                    'general_id' => $analisisg->id_general, 
                    'recubrimiento_muestra' => $request->get("Rmuestra{$contador_recubrimiento }"),
                    'recubrimiento_nomenclatura' => $request->get("Rnomenclatura{$contador_recubrimiento }"),
                    'recubrimiento_inf_requerida' => $request->get("Rinf_requerida{$contador_recubrimiento }"),
                    'recubrimiento_des_muestra' => $request->get("Rdes_muestra{$contador_recubrimiento }"),
                    'recubrimiento_ubicacion' => $request->get("Rubicacion{$contador_recubrimiento }"),
                    'recubrimiento_responsable' => $request->get("Rresponsable{$contador_recubrimiento }"),
                    'recubrimiento_identificacion_muestra'=> $request->get("Riden_muestra{$contador_recubrimiento  }")
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
