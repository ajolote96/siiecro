<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PigmentosSolicitud extends Model
{
    protected $table = 'pigmentos_solicitud';
    protected $fillable = [
    	'general_id',
    	'pigmentos_muestra',
    	'pigmentos_nomenclatura',
    	'pigmentos_inf_requerida',
    	'pigmentos_des_muestra',
    	'pigmentos_ubicacion',
    	'pigmentos_responsable',
    	'pigmentos_identificacion_muestra'];
}
