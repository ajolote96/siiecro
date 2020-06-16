<?php

namespace App\Http\Controllers;

use DB;
use App\AnalisisG;
use App\Obras;
use App\SoportesSolicitud;
use App\base_solicitud;
use App\otros_solicituds;
use App\biodeterioro_solicitud;
use App\material_agregado_solicitud;
use App\SalesSolicitud;
use App\MaterialAsociado;

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
        
            // SOPORTE MUESTRA I
            for ($counters=0; $counters < 7 ; $counters++) { 
                $obtener_id = AnalisisG::latest('id_general')->first();
                if ($request->get("Smuestra{$counters}") != NULL) {

                    if ($request->has("Smuestra{$counters}")) {
                        SoportesSolicitud::create(['general_id' => $analisisg->id_general, 
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
         
        //BASE MUESTRA II
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



            //MATERIAL ASOCIADO X
            for ($counters=0; $counters < 7 ; $counters++) { 
                $obtener_id = AnalisisG::latest('id_general')->first();
                if ($request->get("MASOmuestra{$counters}") != NULL) {

                    if ($request->has("MASOmuestra{$counters}")) {
                        MaterialAsociado::create(['general_id' => $analisisg->id_general, 
                        'materialaso_muestra' => $request->get("MASOmuestra{$counters}"),
                        'materialaso_nomenclatura' => $request->get("MASOnomenclatura{$counters}"),
                        'materialaso_inf_requerida' => $request->get("MASOinf_requerida{$counters}"),
                        'materialaso_des_muestra' => $request->get("MASOdes_muestra{$counters}"),
                        'materialaso_ubicacion' => $request->get("MASOubicacion{$counters}"),
                        'materialaso_responsable' => $request->get("MASOresponsable{$counters}"),
                        'materialaso_identificacion_muestra'=> $request->get("MASOiden_muestra{$counters}")]);
                    }else{
                        break;
                    }
                }
            }


            
            //SALES XI
            for ($counters=0; $counters < 7 ; $counters++) { 
                $obtener_id = AnalisisG::latest('id_general')->first();
                if ($request->get("SALmuestra{$counters}") != NULL) {

                    if ($request->has("SALmuestra{$counters}")) {
                        SalesSolicitud::create(['general_id' => $analisisg->id_general, 
                        'sales_muestra' => $request->get("SALmuestra{$counters}"),
                        'sales_nomenclatura' => $request->get("SALnomenclatura{$counters}"),
                        'sales_inf_requerida' => $request->get("SALinf_requerida{$counters}"),
                        'sales_des_muestra' => $request->get("SALdes_muestra{$counters}"),
                        'sales_ubicacion' => $request->get("SALubicacion{$counters}"),
                        'sales_responsable' => $request->get("SALresponsable{$counters}"),
                        'sales_identificacion_muestra'=> $request->get("SALiden_muestra{$counters}")]);
                    }else{
                        break;
                    }
                }
            }


            //MATERIAL AGREGADO XII
            for ($counters=0; $counters < 7 ; $counters++) { 
                $obtener_id = AnalisisG::latest('id_general')->first();
                if ($request->get("MAGmuestra{$counters}") != NULL) {

                    if ($request->has("MAGmuestra{$counters}")) {
                        material_agregado_solicitud::create(['general_id' => $analisisg->id_general, 
                        'materialag_muestra' => $request->get("MAGmuestra{$counters}"),
                        'materialag_nomenclatura' => $request->get("MAGnomenclatura{$counters}"),
                        'materialag_inf_requerida' => $request->get("MAGinf_requerida{$counters}"),
                        'materialag_des_muestra' => $request->get("MAGdes_muestra{$counters}"),
                        'materialag_ubicacion' => $request->get("MAGubicacion{$counters}"),
                        'materialag_responsable' => $request->get("MAGresponsable{$counters}"),
                        'materialag_identificacion_muestra'=> $request->get("MAGiden_muestra{$counters}")]);
                    }else{
                        break;
                    }
                }
            }


            
            //BIODETERIORO XIII  
            for ($counters=0; $counters < 7 ; $counters++) { 
                $obtener_id = AnalisisG::latest('id_general')->first();
                if ($request->get("BDTmuestra{$counters}") != NULL) {

                    if ($request->has("BDTmuestra{$counters}")) {
                        biodeterioro_solicitud::create(['general_id' => $analisisg->id_general, 
                        'biodeterioro_muestra' => $request->get("BDTmuestra{$counters}"),
                        'biodeterioro_nomenclatura' => $request->get("BDTnomenclatura{$counters}"),
                        'biodeterioro_inf_requerida' => $request->get("BDTinf_requerida{$counters}"),
                        'biodeterioro_des_muestra' => $request->get("BDTdes_muestra{$counters}"),
                        'biodeterioro_ubicacion' => $request->get("BDTubicacion{$counters}"),
                        'biodeterioro_responsable' => $request->get("BDTresponsable{$counters}"),
                        'biodeterioro_identificacion_muestra'=> $request->get("BDTiden_muestra{$counters}")]);
                    }else{
                        break;
                    }
                }
            }
        


            //OTROS Muestra XIV
            for ($counters=0; $counters < 7 ; $counters++) { 
                $obtener_id = AnalisisG::latest('id_general')->first();
                if ($request->get("OTmuestra{$counters}") != NULL) {

                    if ($request->has("OTmuestra{$counters}")) {
                        otros_solicituds::create(['general_id' => $analisisg->id_general, 
                        'otros_muestra' => $request->get("OTmuestra{$counters}"),
                        'otros_nomenclatura' => $request->get("OTnomenclatura{$counters}"),
                        'otros_inf_requerida' => $request->get("OTinf_requerida{$counters}"),
                        'otros_des_muestra' => $request->get("OTdes_muestra{$counters}"),
                        'otros_ubicacion' => $request->get("OTubicacion{$counters}"),
                        'otros_responsable' => $request->get("OTresponsable{$counters}"),
                        'otros_identificacion_muestra'=> $request->get("OTiden_muestra{$counters}")]);
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
        
        //SOPORTE I 
        $soportes = DB::table('soporte_solicitud')->where('general_id', $id_general)
        ->select('soporte_solicitud.*')
        ->get();
       
        //BASE II
        $baseP = DB::table('base_solicituds')->where('general_id', $id_general)
        ->select('base_solicituds.*')
        ->get();
        
        //MATERIAL ASOCIADO X
        $maso = DB::table('material_asociado_solicitud')->where('general_id', $id_general)
        ->select('material_asociado_solicitud.*')
        ->get();

        //SALES XI
        $sal = DB::table('sales_solicitud')->where('general_id', $id_general)
        ->select('sales_solicitud.*')
        ->get();

        //MATERIAL AGREGADO XII
        $materialag = DB::table('material_agregado_solicitud')->where('general_id', $id_general)
        ->select('material_agregado_solicitud.*')
        ->get();

        //Biodeterioro XIII
        $biodeterioro = DB::table('biodeterioro_solicitud')->where('general_id', $id_general)
        ->select('biodeterioro_solicitud.*')
        ->get();

        //OTROS XIV
        $otros = DB::table('otros_solicitud')->where('general_id', $id_general)
        ->select('otros_solicitud.*')
        ->get();
        


        $analisisgs = $analisisg;

        //dd($analisisgs);

        return view('analisisg.show', compact('analisisgs', 'soportes','baseP','otros','biodeterioro','materialag','sal','maso'));
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
       
        //SOPORTE I
        $soportes = DB::table('soporte_solicitud')->where('general_id', $id_general)
        ->select('soporte_solicitud.*')
        ->get();
        
        //BASE II
        $baseP = DB::table('base_solicituds')->where('general_id', $id_general)
        ->select('base_solicituds.*')
        ->get();

        //MATERIAL ASOCIADO X
        $maso = DB::table('material_asociado_solicitud')->where('general_id', $id_general)
        ->select('material_asociado_solicitud.*')
        ->get();

        //SALES XI
        $sal = DB::table('sales_solicitud')->where('general_id', $id_general)
        ->select('sales_solicitud.*')
        ->get();

        //MATERIAL AGREGADO XII
        $materialag = DB::table('material_agregado_solicitud')->where('general_id', $id_general)
        ->select('material_agregado_solicitud.*')
        ->get();
        
        //BIODETERIORO XIV
        $biodeterioro = DB::table('biodeterioro_solicitud')->where('general_id', $id_general)
        ->select('biodeterioro_solicitud.*')
        ->get();


        //OTROS XV
        $otros = DB::table('otros_solicitud')->where('general_id', $id_general)
        ->select('otros_solicitud.*')
        ->get();

        $analisisgs = $analisisg;

        // SE DAN DE ALTA TODAS LAS TABLAS
        
        return view('analisisg.edit', compact('analisisgs','soportes','baseP','otros','biodeterioro','materialag','sal','maso'));
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
        //DECLARACION DE LAS XV TABLAS    

        //SOPORTE I
        $soporte = SoportesSolicitud::where('general_id', $id_general)->get();
       
        //BASE   II
        $baseP = base_solicitud::where('general_id', $id_general)->get();
        
        //MATERIAL ASOCIADO X
        $maso = MaterialAsociado::where('general_id', $id_general)->get();

        //SALES XI
        $sal = SalesSolicitud::where('general_id' , $id_general)->get();

        //MATERIAL AGREGADO XII
        $matag = material_agregado_solicitud::where('general_id', $id_general)->get();

        //BIODETERIORO XIII
        $biodeterioro = biodeterioro_solicitud::where('general_id', $id_general)->get();

        //OTROS XIV
        $otro = otros_solicituds::where('general_id', $id_general)->get();

        //CONTADORES 
        $contador_soporte = 0;   //I
        $contador_base = 0;      //II
        $contador_maso = 0;     //X
        $contador_sal = 0;      //XI    
        $contador_matag = 0;    //XII
        $contador_biodeterioro = 0; //XIII
        $contador_otro = 0;     //XIV 
        //dd($request->all());

        //METODO DE ACTUALIZACION DE SOPORTE I
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
    //METODO DE ACTUALIZACION DE  BASE II
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

    //METODO DE ACTUALIZACION MATERIAL ASOCIADO X
    foreach ($maso as $materialaso) {
        $materialaso->materialaso_muestra = $request->input("MASOmuestra_edit{$contador_maso}");
        $materialaso->materialaso_nomenclatura = $request->input("MASOnomenclatura_edit{$contador_maso}");  
        $materialaso->materialaso_inf_requerida = $request->input("MASOinf_requerida_edit{$contador_maso}");
        $materialaso->materialaso_des_muestra = $request->input("MASOdes_muestra_edit{$contador_maso}");
        $materialaso->materialaso_ubicacion = $request->input("MASOubicacion_edit{$contador_maso}");
        $materialaso->materialaso_responsable = $request->input("MASOresponsable_edit{$contador_maso}");
        $materialaso->materialaso_identificacion_muestra = $request->input("MASOiden_muestra_edit{$contador_maso}");
        $contador_maso +=1;
        //dd($materialaso);
        $materialaso->save();

        if ($request->has('MASOmuestra' . $contador_maso)) {
            MaterialAsociado::firstOrCreate(
                [   
                    'general_id' => $analisisg->id_general, 
                    'materialaso_muestra' => $request->get("MASOmuestra{$contador_maso}"),
                    'materialaso_nomenclatura' => $request->get("MASOnomenclatura{$contador_maso}"),
                    'materialaso_inf_requerida' => $request->get("MASOinf_requerida{$contador_maso}"),
                    'materialaso_des_muestra' => $request->get("MASOdes_muestra{$contador_maso}"),
                    'materialaso_ubicacion' => $request->get("MASOubicacion{$contador_maso}"),
                    'materialaso_responsable' => $request->get("MASOresponsable{$contador_maso}"),
                    'materialaso_identificacion_muestra'=> $request->get("MASOiden_muestra{$contador_maso}")
                ]
            );
        }       
    }

    //METODO DE ACTUALIZACION SALES XI
    foreach ($sal as $sales) {
        $sales->sales_muestra = $request->input("SALmuestra_edit{$contador_sal}");
        $sales->sales_nomenclatura = $request->input("SALnomenclatura_edit{$contador_sal}");  
        $sales->sales_inf_requerida = $request->input("SALinf_requerida_edit{$contador_sal}");
        $sales->sales_des_muestra = $request->input("SALdes_muestra_edit{$contador_sal}");
        $sales->sales_ubicacion = $request->input("SALubicacion_edit{$contador_sal}");
        $sales->sales_responsable = $request->input("SALresponsable_edit{$contador_sal}");
        $sales->sales_identificacion_muestra = $request->input("SALiden_muestra_edit{$contador_sal}");
        $contador_sal +=1;
        //dd($sales);
        $sales->save();

        if ($request->has('SALmuestra' . $contador_sal)) {
            SalesSolicitud::firstOrCreate(
                [   
                    'general_id' => $analisisg->id_general, 
                    'sales_muestra' => $request->get("SALmuestra{$contador_sal}"),
                    'sales_nomenclatura' => $request->get("SALnomenclatura{$contador_sal}"),
                    'sales_inf_requerida' => $request->get("SALinf_requerida{$contador_sal}"),
                    'sales_des_muestra' => $request->get("SALdes_muestra{$contador_sal}"),
                    'sales_ubicacion' => $request->get("SALubicacion{$contador_sal}"),
                    'sales_responsable' => $request->get("SALresponsable{$contador_sal}"),
                    'sales_identificacion_muestra'=> $request->get("SALiden_muestra{$contador_sal}")
                ]
            );
        }       
    }


    
    //METODO DE ACTUALIZACION MATERIAL AGREGADO XII
    foreach ($matag as $materialags) {
        $materialags->materialag_muestra = $request->input("MAGmuestra_edit{$contador_matag}");
        $materialags->materialag_nomenclatura = $request->input("MAGnomenclatura_edit{$contador_matag}");  
        $materialags->materialag_inf_requerida = $request->input("MAGinf_requerida_edit{$contador_matag}");
        $materialags->materialag_des_muestra = $request->input("MAGdes_muestra_edit{$contador_matag}");
        $materialags->materialag_ubicacion = $request->input("MAGubicacion_edit{$contador_matag}");
        $materialags->materialag_responsable = $request->input("MAGresponsable_edit{$contador_matag}");
        $materialags->materialag_identificacion_muestra = $request->input("MAGiden_muestra_edit{$contador_matag}");
        $contador_matag +=1;
        $materialags->save();

        if ($request->has('MAGmuestra' . $contador_matag)) {
            material_agregado_solicitud::firstOrCreate(
                [   
                    'general_id' => $analisisg->id_general, 
                    'materialag_muestra' => $request->get("MAGmuestra{$contador_matag}"),
                    'materialag_nomenclatura' => $request->get("MAGnomenclatura{$contador_matag}"),
                    'materialag_inf_requerida' => $request->get("MAGinf_requerida{$contador_matag}"),
                    'materialag_des_muestra' => $request->get("MAGdes_muestra{$contador_matag}"),
                    'materialag_ubicacion' => $request->get("MAGubicacion{$contador_matag}"),
                    'materialag_responsable' => $request->get("MAGresponsable{$contador_matag}"),
                    'materialag_identificacion_muestra'=> $request->get("MAGiden_muestra{$contador_matag}")
                ]
            );
        }       
    }




    //METODO DE ACTUALIZACION BIODETERIORO XIV
    foreach ($biodeterioro as $biodeterioros) {
        $biodeterioros->biodeterioro_muestra = $request->input("BDTmuestra_edit{$contador_biodeterioro}");
        $biodeterioros->biodeterioro_nomenclatura = $request->input("BDTnomenclatura_edit{$contador_biodeterioro}");  
        $biodeterioros->biodeterioro_inf_requerida = $request->input("BDTinf_requerida_edit{$contador_biodeterioro}");
        $biodeterioros->biodeterioro_des_muestra = $request->input("BDTdes_muestra_edit{$contador_biodeterioro}");
        $biodeterioros->biodeterioro_ubicacion = $request->input("BDTubicacion_edit{$contador_biodeterioro}");
        $biodeterioros->biodeterioro_responsable = $request->input("BDTresponsable_edit{$contador_biodeterioro}");
        $biodeterioros->biodeterioro_identificacion_muestra = $request->input("BDTiden_muestra_edit{$contador_biodeterioro}");
        $contador_biodeterioro +=1;
        $biodeterioros->save();

        if ($request->has('BDTmuestra' . $contador_biodeterioro)) {
            biodeterioro_solicitud::firstOrCreate(
                [
                    'general_id' => $analisisg->id_general, 
                    'biodeterioro_muestra' => $request->get("BDTmuestra{$contador_biodeterioro}"),
                    'biodeterioro_nomenclatura' => $request->get("BDTnomenclatura{$contador_biodeterioro}"),
                    'biodeterioro_inf_requerida' => $request->get("BDTinf_requerida{$contador_biodeterioro}"),
                    'biodeterioro_des_muestra' => $request->get("BDTdes_muestra{$contador_biodeterioro}"),
                    'biodeterioro_ubicacion' => $request->get("BDTubicacion{$contador_biodeterioro}"),
                    'biodeterioro_responsable' => $request->get("BDTresponsable{$contador_biodeterioro}"),
                    'biodeterioro_identificacion_muestra'=> $request->get("BDTiden_muestra{$contador_biodeterioro}")
                ]
            );
        }       
    }


    //METODO DE ACTUALIZACION OTROS XV
    foreach ($otro as $otros) {
        $otros->otros_muestra = $request->input("OTmuestra_edit{$contador_otro}");
        $otros->otros_nomenclatura = $request->input("OTnomenclatura_edit{$contador_otro}");  
        $otros->otros_inf_requerida = $request->input("OTinf_requerida_edit{$contador_otro}");
        $otros->otros_des_muestra = $request->input("OTdes_muestra_edit{$contador_otro}");
        $otros->otros_ubicacion = $request->input("OTubicacion_edit{$contador_otro}");
        $otros->otros_responsable = $request->input("OTresponsable_edit{$contador_otro}");
        $otros->otros_identificacion_muestra = $request->input("OTiden_muestra_edit{$contador_otro}");
        $contador_otro +=1;
        $otros->save();

        if ($request->has('OTmuestra' . $contador_base)) {
            otros_solicituds::firstOrCreate(
                [
                    'general_id' => $analisisg->id_general, 
                    'otros_muestra' => $request->get("OTmuestra{$contador_otro}"),
                    'otros_nomenclatura' => $request->get("OTnomenclatura{$contador_otro}"),
                    'otros_inf_requerida' => $request->get("OTinf_requerida{$contador_otro}"),
                    'otros_des_muestra' => $request->get("OTdes_muestra{$contador_otro}"),
                    'otros_ubicacion' => $request->get("OTubicacion{$contador_otro}"),
                    'otros_responsable' => $request->get("OTresponsable{$contador_otro}"),
                    'otros_identificacion_muestra'=> $request->get("OTiden_muestra{$contador_otro}")
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
