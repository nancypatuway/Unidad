<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator; #para validaciones
use Illuminate\Support\Facades\Input; #para usar el input
use DB; 
use App\Http\Requests;
use App;

use App\PlanGestion;


class ControllerResultados extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Plani= App\Planificacion
        //::join('PlanGestion','planificacion.id','=','plangestion.planificacion_id')->join('anayeva','planificacion.id','=','anayeva.planificacion_id')
        //->join('calificacion','anayeva.id','=','calificacion.anayeva_id')
        ::with('plangestion')
        ->with('user')
        ->with('anayeva')
        ->with('autoevaluacion')
        ->where("finalizado",0)->where("planificacion.users_id",\Auth::user()->id)
        ->first();
        //$PGestion = App\PlanGestion::all();
        $anayeva = App\Anayeva
        ::with('calificacion')
        ->with('tipoanalisis')
        ->with('MedidasPropuestas')
        ->with('PortafolioRiesgo')
        ->where('anayeva.planificacion_id',$Plani->id)
        ->get();

        $anayeva = $anayeva->toArray();
        $count=0;
        //dd($anayeva);
       foreach ($anayeva as $key => $aye) {
            $RiesgoInherente=0;
            foreach($aye['calificacion'] as $cali) {
               //dd($anayeva[$x]['calificacion'][$y]['riesgoinherente']);
                $RiesgoInherente = $RiesgoInherente+floatval($cali['riesgoinherente']);
            }
            //dd($RiesgoInherente);
            $anayeva[$count]['RiesgoInherente']= $RiesgoInherente;
            $count++;
        }

        $Json =$Plani->toArray();
        $Json['anayeva']=$anayeva;
        $Json=Json_encode($Json);
        //dd($Json);
        return view('paginas.reporte', compact('Json'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $PGestion = App\PlanGestion::all();
        return view('paginas.plangestion', compact('PGestion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
