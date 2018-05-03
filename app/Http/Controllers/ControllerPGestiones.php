<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator; #para validaciones
use Illuminate\Support\Facades\Input; #para usar el input

use DB; 
use App\Http\Requests;
use App;


class ControllerPGestiones extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //nombre de variable $users1 se puede cambiar es el parametro que llega en la vista.
        $PGestion = App\PlanGestion::all();
        return view('paginas.plangestion', compact('PGestion'));
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
        try
        {
        //dd($request->all());

        //$plangestion = lo que esta en la BD // DESPUES DEL GET LO QUE ESTA EN LA VISTA EL ID DE CADA INPUT
            $Plani= App\Planificacion::where("finalizado",0)->where("users_id",\Auth::user()->id)->first();
            $plangestion = new App\PlanGestion;
            $plangestion->codplangestion=Input::get("txtNConsecu");
            $plangestion->riesgoasociado=Input::get("txtRiesAso");
            $plangestion->accionmejora=Input::get("txtAcciMejo");
            //$plangestion->detalle=Input::get("txtDetalle");
            //$plangestion->peso=Input::get("cbxPeso");
            $plangestion->plazo=Input::get("txtPlazo");
            $plangestion->finicio=Input::get("txtFechaInicio");
            $plangestion->ffin=Input::get("txtFechaFin");
            $plangestion->accionesrealizadas=Input::get("txtAccionesReali");
            $plangestion->avance=Input::get("txtAvance");
            $plangestion->justificacion=Input::get("txtJustificacion");
            $Token=$request->session()->get('Token');
            $plangestion->token=$Token;
            $plangestion->planificacion_id=$Plani->id;
            $plangestion->save();
            $request->session()->forget('Token');//$request->session()->flush();
            return back()->with('success','Aregado Correctamente');
        }
        catch(\Illuminate\Database\QueryException $ex)
        {dd($ex);   // insert query
           // do task when error
            if($ex->getCode()==23000){
                return back()->with('error','Código ya fue ingresado anteriormente');
            }else{
                return back()->with('error','Se presento un error inesperado al agregar');
            }
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
    public function showallPGestiones()
    {
        //nombre de variable $users1 se puede cambiar es el parametro que llega en la vista.
        $PGestion = App\PlanGestion::all();
        return view('paginas.plangestion', compact('PGestion'));
    }

    public function showPGestiones($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $PGestion = App\Plangestion::find($id);
        $Pesoxplan = App\PesoxPlanGestion::where('token',$PGestion->token)->get();
        $SumPesoxplan = App\PesoxPlanGestion::where('token',$PGestion->token)->sum('peso');
    return view('paginas/plangestionactualizar', compact('PGestion','Pesoxplan','SumPesoxplan'));
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
        try
        {
           $PGestion = App\Plangestion::find($id); //para buscar por id
           $PGestion->codplangestion=Input::get("txtNConsecu");
           $PGestion->riesgoasociado=Input::get("txtRiesAso");
           $PGestion->accionmejora=Input::get("txtAcciMejo");
           //$PGestion->detalle=Input::get("txtDetalle");
           //$PGestion->peso=Input::get("cbxPeso");
           $PGestion->plazo=Input::get("txtPlazo");
           $PGestion->finicio=Input::get("txtFechaInicio");
           $PGestion->ffin=Input::get("txtFechaFin");
           $PGestion->accionesrealizadas=Input::get("txtAccionesReali");
           $PGestion->avance=Input::get("txtAvance");
           $PGestion->justificacion=Input::get("txtAvance");
           $PGestion->save();
           return redirect("plangestion")->with('success','Editado correctamente');
            }
        catch(\Illuminate\Database\QueryException $ex)
            {//dd($ex);   // insert query
               // do task when error
                if($ex->getCode()==23000){
                    return back()->with('error','Código ya fue ingresado anteriormente');
                }else{
                    return back()->with('error','Se presento un error inesperado al agregar');
                }
               //dd($ex);   // insert query
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $PGestion=App\PlanGestion::find($id);
            if (!is_null($PGestion)) {
                $PGestion->delete();
            }
            return redirect("plangestion");
    }

}
