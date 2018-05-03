<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class AliniamientoxPlanificacion extends Model
{
	use Notifiable;

	protected $fillable = [
    	'id',
        'alineamientoconobjetivo',
        'token',
    ];

    protected $table = 'alineamientox_planificacion';

    
}


