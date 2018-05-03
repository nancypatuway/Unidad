<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calificacion extends Model
{
    protected $table = 'calificacion';

    protected $fillable = [
        'probablidad', 
        'impacto',
        'promprobabilidad', 
        'promimpacto',
        'riesgoinherente',
    ];

    public function anayeva() 
    {
        return $this->belongsTo('App\AnayEva');
    }
}
