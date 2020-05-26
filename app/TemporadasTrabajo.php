<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TemporadasTrabajo extends Model
{
    protected $table = 'temporada_trabajo';
    protected $fillable = ['obra_id', 'temporada_trabajo'];

}
