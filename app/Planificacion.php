<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Planificacion extends Model
{
  protected $fillable = [
        'id',
        'fecha',
        'periodo',
        'codplanificacion',
        'tipoplanificacion',
        'nombre',
        'objetivo',
        'alineamiento',
        'condicionesexterno',
        'condicionesinterno',
        'sujetosrelacionados',
        'areasrelacionadas',
        'entradas',
        'diagramaflujo',
        'salida',
        'indicadoresproceso',
        'normativainterna',
        'normativaexterna',
        'evaluacionesanteriores',
        'token',
        'users_id',
        'finalizado',
        'plangestion',
        'anayeva'
    ];
   // referenciar la tabla de la base de datos real//
	protected $table = 'planificacion';
 
					
    public function equipovals()//tabla8 planixequipoval
   	{

   		//App\Producto= nombre de clase en el modelo
   		//anayeva=la tabla de relacion entre plangestiones y portafolioriesgo
   		//plangestion_id= nombre del campo que relaciona el plan gestion con anayeva
   		//portafolioriesgo_id=nombre del campo que relaciona el portafolioriesgo con anayeva
   		//belongstoMany= de muchos a muchos
   		return $this->belongsToMany('App\EquipoVal','PlanixEquipoval', 'equipoval_id', 
   			'planificacion_id');
   		
   	}

   	public function portafolioriesgo()//tabla10 preseleccion
    {

      //App\PortafolioRiesgo= nombre de clase en el modelo
      //Preseleccion=la tabla de relacion entre PortafolioRiesgo y planificacion
      //portafolioriesgo_id= nombre del campo que relaciona el PortafolioRiesgo con Preseleccion
      //planificacion_id=nombre del campo que relaciona el planificacion con Preseleccion
      //belongstoMany= de muchos a muchos
      return $this->belongsToMany('App\PortafolioRiesgo','Preseleccion', 
      	'portafolioriesgo_id', 'planificacion_id');
      
    }
    //relationship - one to one
    //revisar
    public function user()//tabla 5 planificacion
    {
        return $this->hasOne('App\User','id','users_id');
    }

    public function plangestion(){
      return $this->hasMany('App\PlanGestion');
    }

    public function anayeva(){
      return $this->hasMany('App\AnayEva');
    }

    public function autoevaluacion(){
      return $this->hasMany('App\Autoevaluacion');
    }
}