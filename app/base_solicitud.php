<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class base_solicitud extends Model
{
    protected $table = 'base_solicituds';
    protected $fillable = ['general_id','base_muestra','base_nomenclatura','base_inf_requerida','base_des_muestra',
    'base_ubicacion','base_responsable','base_identificacion_muestra'];
}
