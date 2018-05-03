<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EquipoVal extends Model
{
    // referenciar la tabla de la base de datos real//
	protected $table = 'equipoval';
 
   protected $fillable = [
        'nombre', 
        'descripcion'
    ];
					
    public function users()
   	{

   		//App\Producto= nombre de clase en el modelo
   		//anayeva=la tabla de relacion entre plangestiones y portafolioriesgo
   		//plangestion_id= nombre del campo que relaciona el plan gestion con anayeva
   		//portafolioriesgo_id=nombre del campo que relaciona el portafolioriesgo con anayeva
   		//belongstoMany= de muchos a muchos
   		return $this->belongsToMany('App\User','UsuarioxEquipoVal', 'user_id', 
   			'equipoval_id');
   		
   	}

   	public function dependencias()//tabla 9 equipovalxdependencias
   	{

   		//App\Producto= nombre de clase en el modelo
   		//anayeva=la tabla de relacion entre plangestiones y portafolioriesgo
   		//plangestion_id= nombre del campo que relaciona el plan gestion con anayeva
   		//portafolioriesgo_id=nombre del campo que relaciona el portafolioriesgo con anayeva
   		//belongstoMany= de muchos a muchos
   		return $this->belongsToMany('App\Dependencia','EquipoValxDependencia', 'dependencia_id', 'users_id');
   		
   	}
 
					
    public function planificaciones()//tabla8 planixequipoval
   	{

   		//App\Planificacion= nombre de clase en el modelo
   		//PlanixEquipoval=la tabla de relacion entre Planificacion y equipoval
   		//planificacion_id= nombre del campo que relaciona el Planificacion con PlanixEquipoval
   		//equipoval_id=nombre del campo que relaciona el Planificacion con PlanixEquipoval
   		//belongstoMany= de muchos a muchos
   		return $this->belongsToMany('App\Planificacion','PlanixEquipoVal', 'planificacion_id', 'equipoval_id');
   		
   	}


}

