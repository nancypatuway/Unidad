<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dependencia extends Model
{
    // referenciar la tabla de la base de datos real//
	protected $table = 'dependencia';
 
					
    public function equipovals()//tabla 9 EquipoValxDependencia
   	{

   		//App\EquipoVal= nombre de clase en el modelo
   		//EquipoValxDependencia=la tabla de relacion entre equipoval y dependencias
   		//equipoval_id= nombre del campo que relaciona el EquipoVal con EquipoValxDependencia
   		//dependencias_id=nombre del campo que relaciona el EquipoVal con EquipoValxDependencia
   		//belongstoMany= de muchos a muchos
   		return $this->belongsToMany('App\EquipoVal','EquipoValxDependencia', 'equipoval_id', 'dependencia_id');	
   	}

   	public function users()//tabla 7 UsuarioxDependencia
   	{

   		//App\User= nombre de clase en el modelo
   		//UsuarioxDependencia=la tabla de relacion entre user y dependencias
   		//user_id= nombre del campo que relaciona user y UsuarioxDependencia
   		//dependencias_id=nombre del campo que relaciona user y UsuarioxDependencia
   		//belongstoMany= de muchos a muchos
   		return $this->belongsToMany('App\User','UsuarioxDependencia', 'user_id', 'dependencia_id');	
   	}

}
