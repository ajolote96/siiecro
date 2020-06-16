<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BolSolicitud extends Model
{
    protected $table = 'bol_solicitud';
    protected $fillable = [
    	'general_id',
    	'bol_muestra',
    	'bol_nomenclatura',
    	'bol_inf_requerida',
    	'bol_des_muestra',
    	'bol_ubicacion',
    	'bol_responsable',
    	'bol_identificacion_muestra'];
}
