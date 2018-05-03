<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class PlanGestion extends Model
{
  use Notifiable;

    protected $fillable = [
        'id', 'codplangestion', 'riesgoasociado','accionmejora','plazo','finicio','ffin','accionesrealizadas','avance','justificacion','token',
    ];

    protected $table = 'plangestion';

    public function plangestiones()//tabla 12 anayeva
   	{

   		//App\PlanGestion= nombre de clase en el modelo
   		//anayeva=la tabla de relacion entre plangestiones y portafolioriesgo
   		//plangestion_id= nombre del campo que relaciona el plangestion con anayeva
   		//portafolioriesgo_id=nombre del campo que relaciona el portafolioriesgo con anayeva
   		//belongstoMany= de muchos a muchos
   		return $this->belongsToMany('App\PlanGestion','AnayEva', 'plangestion_id', 'portafolioriesgo_id');
   		
   	}

   	public function users()//tabla14 usuarioxplangestion 
    {

      	//App\User= nombre de clase en el modelo
      	//UsuarioxPlanGestion=la tabla de relacion entre User y plangestion
      	//user_id= nombre del campo que relaciona user con UsuarioxPlanGestion
     	//plangestion_id=nombre del campo que relaciona plangestion con UsuarioxPlanGestion
      	//belongstoMany= de muchos a muchos
      	return $this->belongsToMany('App\User','UsuarioxPlanGestion', 
      		'user_id', 'plangestion_id');
      
    }

    public function planificacion() 
  {
    return $this->belongsto('App\Planificacion');
  }
}
