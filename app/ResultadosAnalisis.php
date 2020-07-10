<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResultadosAnalisis extends Model
{
    protected $table = 'resultados_analisis';
    protected $fillable = [
    	'id_registro',
    	'resultado_interpretacion',
    	'resultado_descripcion',
    	'resultado_imagenes',
    	'resultado_datos'];

}
