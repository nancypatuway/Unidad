<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedidasPropuestas extends Model
{
    protected $table = 'medidaspropuestas';

    protected $fillable = [
    	'id',
        'detalle',
        'validacion',
        'nivelriesgo',
        'observacionesanayeva',
    ];

    public function anayeva() {

        return $this->belongsTo('App\AnayEva');
    }
}
