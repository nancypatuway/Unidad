<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoAnalisis extends Model
{
	protected $table = 'tipoanalisis';

    protected $fillable = [
    	'id',
        'tipoanalisis',
        'eventos', 
        'causas',
        'consecuencias',
        'portafolioriesgo'
    ];

    public function anayeva() 
    {
        return $this->belongsTo('App\AnayEva');
    }
    public function portafolioriesgo() 
    {
        return $this->belongsTo('App\PortafolioRiesgo');
    }
}
