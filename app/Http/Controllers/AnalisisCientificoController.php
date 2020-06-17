<?php

namespace App\Http\Controllers;

use DB;
use App\AnalisisCientifico;
use Illuminate\Http\Request;
use App\Obras;
use App\AnalisisG;

class AnalisisCientificoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id = $request->get('idcientifico');
        $a_cientifico = AnalisisCientifico::orderBy('idcientifico', 'DESC')
        ->id($id)
        ->paginate(5);
        return view('registro.index',compact('a_cientifico'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $analisisg = AnalisisG::findOrFail($id);
        $tempo = DB::table('temporada_trabajo')->where('obra_id', $analisisg->id_obra)
        ->select('temporada_trabajo.temporada_trabajo')
        ->get();
        return view('registro.create', compact('analisisg','tempo'));
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
            'idcientifico',
            'id_gene',
            'id_obras',
            'titulo_obra',
            'epoca',
            'año_proyecto',
            'temp_trabajo',
            'tecnica',
            //'cultura',
            'fecha_inicio',
            'nomenclatura_muestra',
            'caracte_analisis',
            'fecha_analisis_cientifico',
            'profesor_responsable',
            'persona_realizo_analisis',
            'forma_obtencion_muestra',
            'esquema',
            'indicaciones',
            'tipo_material',
            'descripcion',
            'microfotografia',
            'info_definir',
            'analisis_microestructural', 
            'analisis_microquimico',     
            'analisis_elemental',        
            'analisis_molecular',        
            'analisis_de_tincion',       
            'otros',
            'lugar_de_resguardo',
            'analisis_microbiologicos',
            'resultado_interpretacion',
            'resultado_descripcion',
            'resultado_conclucion_general',
            'interpretacion_particular', 
        ]);

        $a_cientifico = (new analisisCientifico)->fill($request->all());
        if ($request->hasFile('esquema')) {
            //$a_cientifico->esquema = $request->file('esquema')->store('public');
            $nombre=$request->file('esquema')->getClientOriginalName();
            $request->file('esquema')->move('images', $nombre);
            $a_cientifico->esquema = $nombre;
        }
        if ($request->hasFile('microfotografia')) {
           $nombre=$request->file('microfotografia')->getClientOriginalName();
            $request->file('microfotografia')->move('images', $nombre);
            $a_cientifico->microfotografia = $nombre;
        }
        
        
        
            
        
        $a_cientifico->save();  
   
       return redirect()->route('registro.index')
                        ->with('success','Ficha Creada Exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AnalisisCientifico  $analisisCientifico
     * @return \Illuminate\Http\Response
     */
    public function show(AnalisisCientifico $analisisCientifico, $id)
    {
        $a_cientifico = AnalisisCientifico::findOrFail($id);
        return view('registro.show', compact('a_cientifico'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AnalisisCientifico  $analisisCientifico
     * @return \Illuminate\Http\Response
     */
    public function edit(AnalisisCientifico $analisisCientifico, $idcientifico)
    {
        $a_cientifico = AnalisisCientifico::findOrFail($idcientifico);
        return view('registro.edit', compact('a_cientifico'));    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AnalisisCientifico  $analisisCientifico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idcientifico)
    {
        $a_cientifico = AnalisisCientifico::findOrFail($idcientifico);
        $a_cientifico->id_obras = $request->input('id_obras');
        $a_cientifico->titulo_obra = $request->input('titulo_obra');
        $a_cientifico->temporada_trabajo = $request->input('temporada_trabajo');
        $a_cientifico->epoca = $request->input('epoca');
        $a_cientifico->anio_temporada = $request->input('anio_temporada');
        $a_cientifico->fecha_inicio = $request->input('fecha_inicio');
        $a_cientifico->tecnica = $request->input('tecnica');
        $a_cientifico->nomenclatura_muestra = $request->input('nomenclatura_muestra');
        $a_cientifico->caracte_analisis = $request->input('caracte_analisis');
        $a_cientifico->fecha_analisis_cientifico = $request->input('fecha_analisis_cientifico');
        $a_cientifico->profesor_responsable = $request->input('profesor_responsable');
        $a_cientifico->persona_realizo_analisis = $request->input('persona_realizo_analisis');
        $a_cientifico->forma_obtencion_muestra = $request->input('forma_obtencion_muestra');
        $a_cientifico->indicaciones = $request->input('indicaciones');
        $a_cientifico->tipo_material = $request->input('tipo_material');
        $a_cientifico->descripcion = $request->input('descripcion');
        $a_cientifico->info_definir = $request->input('info_definir');
        $a_cientifico->analisis_morfologico = $request->input('analisis_morfologico');
        $a_cientifico->analisis_microquimico = $request->input('analisis_microquimico');
        $a_cientifico->analisis_elemental = $request->input('analisis_elemental');
        $a_cientifico->analisis_molecular = $request->input('analisis_molecular');
        $a_cientifico->analisis_de_tincion = $request->input('analisis_de_tincion');
        $a_cientifico->otros = $request->input('otros');
        

        
            
        if ($request->hasFile('esquema')) {
        //$a_cientifico->esquema = $request->file('esquema')->store('public');
        $nombre=$request->file('esquema')->getClientOriginalName();
            $request->file('esquema')->move('images', $nombre);
            $a_cientifico->esquema = $nombre;
    }
    if ($request->hasFile('microfotografia')) {
        //$a_cientifico->esquema = $request->file('esquema')->store('public');
        $nombre=$request->file('microfotografia')->getClientOriginalName();
            $request->file('microfotografia')->move('images', $nombre);
            $a_cientifico->microfotografia = $nombre;
    }

    $a_cientifico->save();
    return redirect()->route('registro.index')->with('success','Registro editado.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AnalisisCientifico  $analisisCientifico
     * @return \Illuminate\Http\Response
     */
    public function destroy(AnalisisCientifico $analisisCientifico, $idcientifico)
    {
        $a_cientifico = AnalisisCientifico::findOrFail($idcientifico);
        $a_cientifico->delete();
        return redirect()->route('registro.index')->with('success','Registro eliminado.');
    }
}
