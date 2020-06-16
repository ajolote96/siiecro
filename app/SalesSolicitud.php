<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalesSolicitud extends Model
{
    protected $table = 'sales_solicitud';
    protected $fillable = ['general_id','sales_muestra','sales_nomenclatura','sales_inf_requerida','sales_des_muestra',
    'sales_ubicacion','sales_responsable','sales_identificacion_muestra'];
}
