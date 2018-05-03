<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class PortafolioRiesgo extends Model
{
  use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'codportafolio', 'nombre','descripcion',
    ];
    // referenciar la tabla de la base de datos real//
	protected $table = 'portafolioriesgo';
 
					
    public function plangestiones()//tabla 12 anayeva 
   	{

   		//App\PlanGestion= nombre de clase en el modelo
   		//anayeva=la tabla de relacion entre plangestiones y portafolioriesgo
   		//plangestion_id= nombre del campo que relaciona el plan gestion con anayeva
   		//portafolioriesgo_id=nombre del campo que relaciona el portafolioriesgo con anayeva
   		//belongstoMany= de muchos a muchos
   		return $this->belongsToMany('App\PlanGestion','AnayEva', 'plangestion_id',
      'portafolioriesgo_id');
   		
   	}

    public function planificaciones() //tabla 10 preseleccion
    {

      //App\Planificacion= nombre de clase en el modelo
      //Preseleccion=la tabla de relacion entre plangestiones y portafolioriesgo
      //planificacion_id= nombre del campo que relaciona Planificacion con Preseleccion
      //portafolioriesgo_id=nombre del campo que relaciona Planificacion con Preseleccion
      //belongstoMany= de muchos a muchos
      return $this->belongsToMany('App\Planificacion','Preseleccion', 'planificacion_id', 
        'portafolioriesgo_id');
      
    }

    public function anayeva(){
      return $this->belongsTo('App\AnayEva');
    }

}
    

    


