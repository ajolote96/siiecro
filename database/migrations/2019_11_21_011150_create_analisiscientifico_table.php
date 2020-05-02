<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnalisiscientificoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('analisiscientifico', function (Blueprint $table) {
            $table->increments('idcientifico');
            $table->unsignedInteger('id_gene');
            $table->char('id_obras', 50)->nullable();
            $table->string('titulo_obra');
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
            $table->string('lugar_de_resguardo');
            $table->string('caracte_analisis');
            $table->date('fecha_analisis_cientifico');
            $table->string('profesor_responsable');
            $table->string('persona_realizo_analisis');
            $table->string('forma_obtencion_muestra');
            $table->string('esquema')->default('Sin imagen');//Son parte de la ubicacion de la toma de muestra--Son Imagenes
            $table->string('indicaciones');//Son parte de ubicacion de la toma de muestra
            $table->string('tipo_material');//Son parte de caracteristicas de observacion preeliminar 
            $table->string('descripcion');//Son parte de caracteristicas de observacion preeliminar 
            $table->string('microfotografia')->default('Sin imagen');//Son parte de caracteristicas de observacion preeliminar--Son Imagenes
            $table->string('info_definir');
            $table->string('analisis_microestructural'); //Parte de analisis a realizar.
            $table->string('analisis_microquimico');     //Parte de analisis a realizar.
            $table->string('analisis_elemental');        //Parte de analisis a realizar.
            $table->string('analisis_molecular');        //Parte de analisis a realizar.
            $table->string('analisis_de_tincion');       //Parte de analisis a realizar.
            $table->string('analisis_microbiologicos');       //Parte de analisis a realizar.
            $table->string('otros');                     //Parte de analisis a realizar.
            
            //RESULTADO DE ANALISIS CON MICROSCOPIO OPTICO
            $table->string('resultado_interpretacion');
            $table->string('resultado_descripcion');
            $table->string('resultado_conclucion_general');
            $table->string('interpretacion_particular');
            //$table->string('resultado_imagenes')->default('Sin imagen');             //SON IMAGENES.
            //$table->string('resultado_datos')->default('Sin imagen');                //SON IMAGENES.
            $table->timestamps();

            $table->foreign('id_gene')->references('id_general')->on('analisisg')
            ->onUpdate('cascade')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('analisiscientifico');
    }
}
