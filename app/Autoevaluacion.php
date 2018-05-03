<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Autoevaluacion extends Model
{
    protected $table = 'autoevaluacion';

    protected $fillable = [
        'id', 'consecutivoauto', 'medidascontrolauto','ponderacionauto','cumplimientoauto','efectividadauto','calificacionauto','calificacionponderacionauto','riesgoasociadoauto','observacionauto',
    ];

    public function autoevaluaciones()//tabla 15 autoevaluacion
    {

      //App\User= nombre de clase en el modelo
      //AutoevaPlangestionAnayeva=la tabla de relacion entre autoevaluacion y anayeva
      //user_id= nombre del campo que relaciona user con calificacion
      //anayeva_id=nombre del campo que relaciona user con calificacion
      //belongstoMany= de muchos a muchos
      return $this->belongsToMany('App\Autoevaluacion','AutoevaPlangestionAnayeva', 'autoevaluacion_id', 'anayeva_id');
      
    }

    public function planificacion() 
  {
    return $this->belongsTo('App\Planificacion');
  }
    
}
