<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnalisisG extends Model
{
	protected $table = 'analisisg';
    protected $primaryKey = 'id_general';
    protected $fillable = [
        'id_general',
        'id_obra',
        'id_de_obra',
        'titulo_obra',
    	'temp_obra',
    	'epoca_obra',
    	'tipo_obj_obra',
    	'lugar_proce_ori',
    	'lugar_proce_act',
    	'no_inv_obra',
    	'respon_intervencion',
    	'proyecto_obra',
    	'año_proyec_obra',
        'fecha_de_inicio',
        'foto'=>'required|image|mimes:jpeg,jpg,png',
        'alto',
        'ancho',	
        'profundidad',
        'diametro',
        'tecnica',
        'autor',
        'analisis'
        
    ];

    public function scopeId($query, $id)
{
    if ($id)
        return $query->where('id_obra', 'LIKE', "%$id%");
}

    public function obra()
    {
    	return $this->belongsTo('App\Obras', 'id');
    }
    public function registro()
    {
        return $this->hasMany('App\AnalisisCientifico', 'id_gene');
    }
}
