<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AniosTemporada extends Model
{
    protected $table = 'anio_temporada';
    protected $fillable = ['id','obra_id', 'anio_temporada_trabajo'];
}
