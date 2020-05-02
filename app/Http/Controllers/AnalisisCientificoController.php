<?php

namespace App\Http\Controllers;

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
        return view('registro.create', compact('analisisg'));
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
            'proyecto_ecro',
            'año_proyecto',
            'temp_trabajo',
            'lugar_p_origen',
            'lugar_p_actual',
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
        $a_cientifico->temp_trabajo = $request->input('temp_trabajo');
        $a_cientifico->epoca = $request->input('epoca');
        $a_cientifico->lugar_p_origen = $request->input('lugar_p_origen');
        $a_cientifico->lugar_p_actual = $request->input('lugar_p_actual');
        $a_cientifico->proyecto_ecro = $request->input('proyecto_ecro');
        $a_cientifico->año_proyecto = $request->input('año_proyecto');
        $a_cientifico->fecha_inicio = $request->input('fecha_inicio');
        $a_cientifico->tecnica = $request->input('tecnica');
        $a_cientifico->autor = $request->input('autor');
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
        $a_cientifico->analisis_microestructural = $request->input('analisis_microestructural');
        $a_cientifico->analisis_microquimico = $request->input('analisis_microquimico');
        $a_cientifico->analisis_elemental = $request->input('analisis_elemental');
        $a_cientifico->analisis_molecular = $request->input('analisis_molecular');
        $a_cientifico->analisis_de_tincion = $request->input('analisis_de_tincion');
        $a_cientifico->otros = $request->input('otros');
        /*$a_cientifico->id_obras = $request->input('id_obras');
        $a_cientifico->id_obras = $request->input('id_obras');
        $a_cientifico->id_obras = $request->input('id_obras');
        $a_cientifico->id_obras = $request->input('id_obras');*/


           /*$table->string('autor');
            $table->string('epoca');
            $table->string('proyecto_ecro');
            $table->integer('año_proyecto');
            $table->string('temp_trabajo');
            $table->string('lugar_p_origen');
            $table->string('lugar_p_actual');
            $table->string('tecnica');
            //$table->string('cultura');
            $table->date('fecha_inicio');
            $table->string('nomenclatura_muestra');
            $table->string('');
            $table->date('');
            $table->string('');
            $table->string('');
            $table->string('');
            $table->string('esquema')->default('Sin imagen');//Son parte de la ubicacion de la toma de muestra--Son Imagenes

            $table->string('');//Son parte de ubicacion de la toma de muestra
            $table->string('');//Son parte de caracteristicas de observacion preeliminar 
            $table->string('');//Son parte de caracteristicas de observacion preeliminar 
            $table->string('')->default('Sin imagen');//Son parte de caracteristicas de observacion preeliminar--Son Imagenes
            $table->string('');
            $table->string(''); //Parte de analisis a realizar.
            $table->string('');     //Parte de analisis a realizar.
            $table->string('');        //Parte de analisis a realizar.
            $table->string('');        //Parte de analisis a realizar.
            $table->string('');       //Parte de analisis a realizar.
            $table->string('');   */
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
