<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnayEva extends Model
{
    protected $table = 'anayeva';

    protected $fillable = [
        'id',
        'modprobabilidad',
        'modimpacto',
        'probabilidad2',
        'impacto2',
        'riesgoresidual',

    ];

    public function users()//tabla 13 calificacion
    {

      //App\User= nombre de clase en el modelo
      //Calificacion=la tabla de relacion entre plangestiones y portafolioriesgo
      //user_id= nombre del campo que relaciona user con calificacion
      //anayeva_id=nombre del campo que relaciona user con calificacion
      //belongstoMany= de muchos a muchos
      return $this->belongsToMany('App\User','Calificacion', 'user_id', 'anayeva_id');
      
    }
    //belongstoOne
  public function planificacion() 
  {
    return $this->belongsTo('App\Planificacion');
  }

  public function Calificacion() 
  {
    return $this->hasMany('App\Calificacion', 'anayeva_id', 'id');
  }

  public function portafolioriesgo() 
  {
    return $this->hasone('App\PortafolioRiesgo',"id","portafolio_id");
  }

  public function MedidasPropuestas() 
  {
    return $this->hasMany('App\MedidasPropuestas', 'anayeva_id', 'id');
  }

  public function TipoAnalisis() 
  {
    return $this->hasMany('App\TipoAnalisis', 'anayeva_id', 'id');
  }
}
