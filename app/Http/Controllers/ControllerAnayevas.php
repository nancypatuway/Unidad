<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator; #para validaciones
use Illuminate\Support\Facades\Input; #para usar el input
use DB; 
use App\Http\Requests;
use App;
use App\AnayEva;
use App\Calificacion;
use App\TipoAnalisis;
use App\MedidasPropuestas;



class ControllerAnayevas extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $TipoAnalisis = TipoAnalisis::all();
        $calificaciones = Calificacion::all();
        $MedidasExistentes = AnayEva::all(); //$MedidasExistentes $Anayeva1
        $Mpropuestas = MedidasPropuestas::all();

        //$Mexistentes = Calificacion::all();
        
        return view('paginas.anayeva', compact('TipoAnalisis','calificaciones','MedidasExistentes', 'Mpropuestas'));
    }

    public function ObtnerDatos(Request $request){
        $Plani= App\Planificacion::where("finalizado",0)->where("users_id",\Auth::user()->id)->first();
        $portafolio = App\PortafolioRiesgo::all();
        $obj = (object) [
            "Planificacion"=> $Plani==null?null: $Plani->toArray(),
            "PortafolioRiesgo"=>$portafolio->toArray()
        ];
        return (json_encode($obj));
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
        try{
            //return 1;
            $Plani= App\Planificacion::where("finalizado",0)->where("users_id",\Auth::user()->id)->first();
            $anayeva= App\Anayeva::where("planificacion_id",$Plani->id)
            ->where("portafolio_id",Input::get("cbxPortafolio"))->first();
            if($anayeva == null){
                $anayeva = new App\Anayeva;
                $anayeva->portafolio_id=Input::get("cbxPortafolio");
                $anayeva->planificacion_id=$Plani->id;
                $anayeva->users_id=$Plani->users_id;
                $anayeva->save();
            }
            $TipoAnalisis = new App\TipoAnalisis;
            $inputs = $request->except('_token');
            $TipoAnalisis->tipoanalisis = Input::get("cbxTipoAna");
            $TipoAnalisis->eventos = Input::get("txtEvento");
            $TipoAnalisis->causas = Input::get("txtCausas");
            $TipoAnalisis->consecuencias = Input::get("txtConsecuencias");
            $TipoAnalisis->anayeva_id = $anayeva->id;
            $TipoAnalisis->save();
             /*
            App\AnayEva::insert(
                [
                    'tipoanalisis'=> $request->cbxTipoAna,
                    'eventos' => $request->txtEvento,
                    'causas' => $request->txtCausas,
                    'consecuencias' => $request->txtConsecuencias
                ]);
                */
            //return redirect("anayeva")->with('success','Agregado correctamente');
                return App\TipoAnalisis::where("anayeva_id",$anayeva->id)->get()->toArray();;
        }
        catch(\Illuminate\Database\QueryException $ex)
        {
            return(8558);
           // do task when error
            //if($ex->getCode()==23000){
                //return back()->with('error','Código ya ingresado anteriormente');
            //}else{
                //return back()->with('error','Se presento un error inesperado al Agregar');
            //}
           //dd($ex);   // insert query
        }
        //return redirect("portafolio");
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showall()
    {
        $TipoAnalisis = App\TipoAnalisis::all();
        return view('paginas.anayeva', compact('TipoAnalisis'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $TipoAnalisis = App\TipoAnalisis::find($id);
        return view('paginas.anayevaactualizar', compact('TipoAnalisis'));
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
        $TipoAnalisis = App\TipoAnalisis::find($id);
        $TipoAnalisis->tipoanalisis = Input::get("cbxTipoAna");
        $TipoAnalisis->eventos = Input::get("txtEvento");
        $TipoAnalisis->causas = Input::get("txtCausas");
        $TipoAnalisis->consecuencias = Input::get("txtConsecuencias");
        
        $Anayeva1->save();
        return redirect("anayeva");
    }

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $TipoAnalisis=App\TipoAnalisis::find($id);
            if (!is_null($TipoAnalisis)) {
                $TipoAnalisis->delete();
            }
            return redirect("anayeva");
    }
    //****************   tabla2  calificaciones  ************************************************


    public function store2(Request $request)
    {
        try{
            //para jalar la planificacion
            $Plani= App\Planificacion::where("finalizado",0)->where("users_id",\Auth::user()->id)->first();
            $anayeva= App\Anayeva::where("planificacion_id",$Plani->id)
            ->where("portafolio_id",Input::get("cbxPortafolio"))
            ->first();
            //return json_encode($anayeva);

            $calificaciones = new App\Calificacion;
            $calificaciones->probablidad = Input::get("cbxProbabilidad");
            $calificaciones->impacto = Input::get("cbxImpacto");
            $calificaciones->promprobabilidad = Input::get("txtPromProba"); 
            $calificaciones->promimpacto = Input::get("txtPromImpa");
            $calificaciones->riesgoinherente = Input::get("txtRiesInh");
            $calificaciones->anayeva_id = $anayeva->id;
            //$calificaciones->planificacion_id=$Plani->id;

            $calificaciones->save();
            //return redirect("anayeva")->with('success','Agregado correctamente');
            return App\Calificacion::where("anayeva_id",$anayeva->id)->get()->toArray();;
             }
            catch(\Illuminate\Database\QueryException $ex)
            {
               // do task when error
                return 77;
                //if($ex->getCode()==23000){
                //    return back()->with('error','Código ya ingresado anteriormente');
                //}else{
                    //return $ex;
                //    return back()->with('error','Se presento un error inesperado al agregar al calificación');
                //}
               //dd($ex);   // insert query
            }
        //return redirect("portafolio");
    }

    public function show2($id)
    {
        $calificaciones = App\Calificacion::all();
        return view('paginas.anayeva', compact('calificaciones'));
    }

    public function destroy2($id)
    {
        $calificaciones=App\Calificacion::find($id);
            if (!is_null($calificaciones)) {
                $calificaciones->delete();
            }
            return redirect("anayeva");

    }

    //****************************** tabla 3 medidas existenes ************************
    
    public function store3(Request $request)
    {
        try{
            $Plani= App\Planificacion::where("finalizado",0)->where("users_id",\Auth::user()->id)->first();
            $anayeva= App\Anayeva::where("planificacion_id",$Plani->id)
            ->where("portafolio_id",Input::get("cbxPortafolio"))->first();
            //return Input::get("cbxPortafolio");
            $anayeva->modprobabilidad = Input::get("txtModiProba");
            $anayeva->modimpacto = Input::get("txtModiImpac");
            $anayeva->probabilidad2 = Input::get("cbxProbabilidad2"); 
            $anayeva->impacto2 = Input::get("cbxImpacto2");
            $anayeva->riesgoresidual = Input::get("txtRiesgoRes");

            $anayeva->save();
            return $anayeva->toArray();;
             }
           
            catch(Exception  $e) {
                return $e->getMessage();
                if($ex->getCode()==23000){
                    return back()->with('error','Código ya ingresado anteriormente');
                }else{
                    return $ex;
                    //return back()->with('error','Se presento un error inesperado al agregar al calificación');
                }
               //dd($ex);   // insert query
            }
        //return redirect("portafolio");
    }

    public function show3($id)
    {
        $Mexistentes = App\Calificacion::all();
        return view('paginas.anayeva', compact('Mexistentes'));
    }

    public function destroy3($id)
    {
        $Mexistentes=App\Calificacion::find($id);
            if (!is_null($Mexistentes)) {
                $Mexistentes->delete();
            }
            return redirect("anayeva");

    }
    

     //****************************** tabla medidas propuestas ************************
    
    public function store4(Request $request)
    {
        try{
            $Plani= App\Planificacion::where("finalizado",0)->where("users_id",\Auth::user()->id)->first();
            $anayeva= App\Anayeva::where("planificacion_id",$Plani->id)
            ->where("portafolio_id",Input::get("cbxPortafolio"))->first();
            //return $anayeva;

            $Mpropuestas = new App\MedidasPropuestas;
            $Mpropuestas->detalle = Input::get("txtDetalles");
            $Mpropuestas->validacion = Input::get("cbxValidacion");
            $Mpropuestas->nivelriesgo = Input::get("cbxNivelRiesgo"); 
            $Mpropuestas->observaciones = Input::get("txtObservac");
            $Mpropuestas->anayeva_id = $anayeva->id;
            $Mpropuestas->save();

            return App\MedidasPropuestas::where("anayeva_id",$anayeva->id)->get()->toArray();;
             }
            catch(\Illuminate\Database\QueryException $ex)
            {
               // do task when error
                if($ex->getCode()==23000){
                    return back()->with('error','Código ya ingresado anteriormente');
                }else{
                    return $ex;
                    //return back()->with('error','Se presento un error inesperado al agregar al calificación');
                }
               //dd($ex);   // insert query
            }
        //return redirect("portafolio");
    }

    public function show4($id)
    {
        $Mpropuestas = App\MedidasPropuestas::all();
        return view('paginas.anayeva', compact('Mpropuestas'));
    }

    public function destroy4($id)
    {
        $Mpropuestas=App\MedidasPropuestas::find($id);
            if (!is_null($Mpropuestas)) {
                $Mpropuestas->delete();
            }
            return redirect("anayeva");

    }
    

}
