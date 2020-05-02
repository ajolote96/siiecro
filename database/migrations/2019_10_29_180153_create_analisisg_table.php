<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnalisisgTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('analisisg', function (Blueprint $table) {
            $table->increments('id_general'); /*'No. de Registro del analisis'*/
            $table->integer('id_obra')->unsigned(); /*'No. de la obra que se hara un analisis'*/
            $table->char('id_de_obra', 50)->nullable(); /*'No. de la obra que se hara un analisis'*/
            $table->string('titulo_obra'); /*'Titulo de la Obra/Pieza/Agrupación'*/
            $table->string('temp_obra'); /*'Temporalidad'*/
            $table->string('epoca_obra')->nullable(); /*'Epoca'*/
            $table->string('tipo_bien_cultu'); /*'Tipo de bien cultural'*/
            $table->string('tipo_obj_obra'); /*'Tipo de objeto'*/
            $table->string('lugar_proce_ori'); /*'Lugar de Procedencia Original'*/
            $table->string('lugar_proce_act'); /*'Lugar de Procedencia Actual'*/
            $table->string('no_inv_obra'); /*'No. de Inventario'*/
            $table->string('respon_intervencion'); /*'Responsables ECRO'*/
            $table->string('proyecto_obra');  /*'Proyecto'*/
            $table->integer('año_proyec_obra'); /*'Año del Proyecto'*/
            $table->date('fecha_de_inicio')->default(now()); /*'Fecha de entrada'*/
            $table->string('foto')->default('Sin imagen');/*Variable para foto*/
            $table->string('alto')->nullable();//variable para la altura
            $table->string('ancho')->nullable();//variable para la anchura
            $table->string('profundidad')->nullable();//variable para la profundidad
            $table->string('diametro')->nullable();//variable para el diametro
            $table->string('tecnica');//variable para la tecnica
            $table->integer('Smuestra')->nullable();//variable para el numero de muestra de soporte
            $table->char('Snomenclatura', 30)->nullable();
            $table->char('Sinf_requerida', 30)->nullable();
            $table->char('Sdes_muestra', 30)->nullable();
            $table->char('Subicacion', 30)->nullable();
            $table->char('Smotivo', 30)->nullable();
            $table->char('Sresponsable', 30)->nullable();
            $table->integer('Siden_muestra')->nullable();
            $table->integer('BPmuestra')->nullable();//variable para el numero de muestra de base de preparacion
            $table->char('BPnomenclatura', 30)->nullable();
            $table->char('BPinf_requerida', 30)->nullable();
            $table->char('BPdes_muestra', 30)->nullable();
            $table->char('BPubicacion', 30)->nullable();
            $table->char('BPmotivo', 30)->nullable();
            $table->char('BPresponsable', 30)->nullable();
            $table->integer('BPiden_muestra')->nullable();
            $table->integer('Emuestra')->nullable();//variable para el numero de muestra de estratigrafia
            $table->char('Enomenclatura', 30)->nullable();
            $table->char('Einf_requerida', 30)->nullable();
            $table->char('Edes_muestra', 30)->nullable();
            $table->char('Eubicacion', 30)->nullable();
            $table->char('Emotivo', 30)->nullable();
            $table->char('Eresponsable')->nullable();
            $table->integer('Eiden_muestra')->nullable();
            $table->integer('REmuestra')->nullable();//variable para el numero de muestra de revoque y enlucido
            $table->char('REnomenclatura', 30)->nullable();
            $table->char('REinf_requerida', 30)->nullable();
            $table->char('REdes_muestra', 30)->nullable();
            $table->char('REubicacion', 30)->nullable();
            $table->char('REmotivo', 30)->nullable();
            $table->char('REresponsable', 30)->nullable();
            $table->integer('REiden_muestra')->nullable();
            $table->integer('BOLmuestra')->nullable();//variable para el numero de muestra de bol
            $table->char('BOLnomenclatura', 30)->nullable();
            $table->char('BOLinf_requerida', 30)->nullable();
            $table->char('BOLdes_muestra', 30)->nullable();
            $table->char('BOLubicacion', 30)->nullable();
            $table->char('BOLmotivo', 30)->nullable();
            $table->char('BOLresponsable', 30)->nullable();
            $table->integer('BOLiden_muestra')->nullable();
            $table->integer('LMmuestra')->nullable();//variable para el numero de muestra de laminas metalicas
            $table->char('LMnomenclatura', 30)->nullable();
            $table->char('LMinf_requerida', 30)->nullable();
            $table->char('LMdes_muestra', 30)->nullable();
            $table->char('LMubicacion', 30)->nullable();
            $table->char('LMmotivo', 30)->nullable();
            $table->char('LMresponsable', 30)->nullable();
            $table->integer('LMiden_muestra')->nullable();
            $table->integer('Pmuestra')->nullable();//variable para el numero de muestra de pigmentos
            $table->char('Pnomenclatura', 30)->nullable();
            $table->char('Pinf_requerida', 30)->nullable();
            $table->char('Pdes_muestra', 30)->nullable();
            $table->char('Pubicacion', 30)->nullable();
            $table->char('Pmotivo', 30)->nullable();
            $table->char('Presponsable', 30)->nullable();
            $table->integer('Piden_muestra')->nullable();
            $table->integer('Amuestra')->nullable();//variable para el numero de muestra aglutinante
            $table->char('Anomenclatura', 30)->nullable();
            $table->char('Ainf_requerida', 30)->nullable();
            $table->char('Ades_muestra', 30)->nullable();
            $table->char('Aubicacion', 30)->nullable();
            $table->char('Amotivo', 30)->nullable();
            $table->char('Aresponsable', 30)->nullable();
            $table->integer('Aiden_muestra')->nullable();
            $table->integer('Rmuestra')->nullable();//variable para el numero de muestra recubrimiento
            $table->char('Rnomenclatura', 30)->nullable();
            $table->char('Rinf_requerida', 30)->nullable();
            $table->char('Rdes_muestra', 30)->nullable();
            $table->char('Rubicacion', 30)->nullable();
            $table->char('Rmotivo', 30)->nullable();
            $table->char('Rresponsable', 30)->nullable();
            $table->integer('Riden_muestra')->nullable();
            $table->integer('MASOmuestra')->nullable();//variable para el numero de muestra material asociado
            $table->char('MASOnomenclatura', 30)->nullable();
            $table->char('MASOinf_requerida', 30)->nullable();
            $table->char('MASOdes_muestra', 30)->nullable();
            $table->char('MASOubicacion', 30)->nullable();
            $table->char('MASOmotivo', 30)->nullable();
            $table->char('MASOresponsable', 30)->nullable();
            $table->integer('MASOiden_muestra')->nullable();
            $table->integer('SALmuestra')->nullable();//variable para el numero de muestra sales
            $table->char('SALnomenclatura', 30)->nullable();
            $table->char('SALinf_requerida', 30)->nullable();
            $table->char('SALdes_muestra', 30)->nullable();
            $table->char('SALubicacion', 30)->nullable();
            $table->char('SALmotivo', 30)->nullable();
            $table->char('SALresponsable', 30)->nullable();
            $table->integer('SALiden_muestra')->nullable();
            $table->integer('MAGREmuestra')->nullable();//variable para el numero de muestra de material agregado
            $table->char('MAGREnomenclatura', 30)->nullable();
            $table->char('MAGREinf_requerida', 30)->nullable();
            $table->char('MAGREdes_muestra', 30)->nullable();
            $table->char('MAGREubicacion', 30)->nullable();
            $table->char('MAGREmotivo', 30)->nullable();
            $table->char('MAGREresponsable', 30)->nullable();
            $table->integer('MAGREiden_muestra')->nullable();
            $table->integer('BIOmuestra')->nullable();//variable para el numero de muestra de biodeterioro
            $table->char('BIOnomenclatura', 30)->nullable();
            $table->char('BIOinf_requerida', 30)->nullable();
            $table->char('BIOdes_muestra', 30)->nullable();
            $table->char('BIOubicacion', 30)->nullable();
            $table->char('BIOmotivo', 30)->nullable();
            $table->char('BIOresponsable', 30)->nullable();
            $table->integer('BIOiden_muestra')->nullable();
            $table->integer('OTROmuestra')->nullable();//variable para el numero de muestra de otros
            $table->char('OTROnomenclatura', 30)->nullable();
            $table->char('OTROinf_requerida', 30)->nullable();
            $table->char('OTROdes_muestra', 30)->nullable();
            $table->char('OTROubicacion', 30)->nullable();
            $table->char('OTROmotivo', 30)->nullable();
            $table->char('OTROresponsable', 30)->nullable();
            $table->integer('OTROiden_muestra')->nullable();

            $table->timestamps();

            $table->foreign('id_obra')->references('id')->on('obras')
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
        Schema::dropIfExists('analisisg');
    }
}
