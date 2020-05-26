<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AniosTemporada extends Model
{
    protected $table = 'anio_temporada';
    protected $fillable = ['obra_id', 'anio_temporada_trabajo'];
}
