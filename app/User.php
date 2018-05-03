<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','tipousuario','confirmed',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function planificacion()//tabla 5 planificacion
    {
        return $this->belongsTo('App\Planificacion');
    }

    public function equipovals()//tabla 6 usuarioxequipoval
    {

        //App\EquipoVal= nombre de clase en el modelo
        //UsuarioxEquipo=la tabla de relacion entre EquipoVal y user
        //equipoval_id= nombre del campo que relaciona el EquipoVal con UsuarioxEquipo
        //user_id=nombre del campo que relaciona el user con UsuarioxEquipo
        //belongstoMany= de muchos a muchos
        return $this->belongsToMany('App\EquipoVal','UsuarioxEquipoVal', 'equipoval_id', 
            'user_id');
    }

    public function anayevas()//tabla 13 calificacion
    {

      //App\AnayEva= nombre de clase en el modelo
      //Calificacion=la tabla de relacion entre AnayEva y user
      //anayeva_id= nombre del campo que relaciona  anayeva con Calificacion
      //user_id=nombre del campo que relaciona user_id con Calificacion
      //belongstoMany= de muchos a muchos
      return $this->belongsToMany('App\AnayEva','Calificacion', 
        'anayeva_id', 'user_id');
      
    }

    public function plangestiones()//tabla 14 usuarioxplangestion
    {

        //App\PlanGestion= nombre de clase en el modelo
        //UsuarioxPlanGestion=la tabla de relacion entre plangestiones y user
        //plangestion_id= nombre del campo que relaciona plangestion con UsuarioxPlanGestion
        //user_id=nombre del campo que relaciona user con UsuarioxPlanGestion
        //belongstoMany= de muchos a muchos
        return $this->belongsToMany('App\PlanGestion','UsuarioxPlanGestion', 
            'plangestion_id', 'user_id');
      
    }

    public function dependencias()//tabla7 usuariosxdependencias
    {

        //App\Dependencias= nombre de clase en el modelo
        //UsuarioxDependencia=la tabla de relacion entre plangestiones y portafolioriesgo
        //dependencias_id= nombre del campo que relaciona el Dependencias con UsuarioxDependencia
        //user_id=nombre del campo que relaciona el user con UsuarioxDependencia
        //belongstoMany= de muchos a muchos
        return $this->belongsToMany('App\Dependencia','UsuarioxDependencia', 
            'dependencia_id', 'user_id');    
    }
}
