<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator; #para validaciones
use Illuminate\Support\Facades\Input; #para usar el input
use DB; 
use App\Http\Requests;
use App;

class ControllerAutoevaluaciones extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //nombre de variable $ se puede cambiar es el parametro que llega en la vista.
        $Autoeva = App\Autoevaluacion::all();
        return view('paginas.autoevaluacion', compact('Autoeva'));
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
            $Plani= App\Planificacion::where("finalizado",0)->where("users_id",\Auth::user()->id)->first();
            //para validar cumplimiento
            if(Input::get("cbxCumplimiento") == "---"){
                return redirect()->back()->with('error','Favor seleccionar algún valor de cumplimiento')->withInput();
            }

            //para validar efectividad
            if(Input::get("cbxEfectividad") == "---"){
                return redirect()->back()->with('error','Favor seleccionar algún valor de Efectividad')->withInput();
            }

            //$Autoeva= lo que esta en la BD // DESPUES DEL GET LO QUE ESTA EN LA VISTA EL ID DE CADA INPUT
            $Autoeva = new App\Autoevaluacion;
            //llave foranea de autoevalucion para obtener planificacion
            $Autoeva->planificacion_id=$Plani->id;
            $Autoeva->consecutivoauto=Input::get("txtconsecutivoauto");
            $Autoeva->medidascontrolauto=Input::get("txtMedidas");
            $Autoeva->ponderacionauto=Input::get("txtPonderacion");
            $Autoeva->cumplimientoauto=Input::get("cbxCumplimiento");
            $Autoeva->efectividadauto=Input::get("cbxEfectividad");

            $valCali=floatval(Input::get("cbxCumplimiento"))*floatval(Input::get("cbxEfectividad"));
            $valCaliPon=floatval(Input::get("txtPonderacion"))*$valCali;
            $Autoeva->calificacionauto=$valCali;
            $Autoeva->calificacionponderacionauto=$valCaliPon;
            $Autoeva->riesgoasociadoauto=Input::get("txtRiesgoAso");
            $Autoeva->observacionauto=Input::get("txtObservaciones");
            //dd($valCali);
            $Autoeva->save();
            return back()->with('success','Aregado a Autoevaluación correctamente');
        }
        catch(\Illuminate\Database\QueryException $ex)
        {
           // do task when error
            dd($ex);
            if($ex->getCode()==23000){
                return back()->with('error','Código ya ingresado anteriormente');
            }else{
                return back()->with('error','Se presento un error inesperado al agregar a Autoevaluación correctamente');
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
    public function showall()
    {
        $Autoeva = App\Autoevaluacion::all();
        return view('paginas.autoevaluacion', compact('Autoeva'));
    } 

    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Autoeva = App\Autoevaluacion::find($id);
        return view('paginas.autoevaluacionactualizar', compact('Autoeva'));
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
            //para validar cumplimiento
            if(Input::get("cbxCumplimiento") == "---"){
                return redirect()->back()->with('error','Favor seleccionar algún valor de cumplimiento')->withInput();
            }

            //para validar efectividad
            if(Input::get("cbxEfectividad") == "---"){
                return redirect()->back()->with('error','Favor seleccionar algún valor de Efectividad')->withInput();
            }

            //$autoevaluacion = lo que esta en la BD // DESPUES DEL GET LO QUE ESTA EN LA VISTA EL ID DE CADA INPUT

            $Autoeva = App\Autoevaluacion::find($id); //para buscar por id
            $Autoeva->consecutivoauto=Input::get("txtconsecutivoauto");
            $Autoeva->medidascontrolauto=Input::get("txtMedidas");
            $Autoeva->ponderacionauto=Input::get("txtPonderacion");
            $Autoeva->cumplimientoauto=Input::get("cbxCumplimiento");
            $Autoeva->efectividadauto=Input::get("cbxEfectividad");
            $Autoeva->calificacionauto=Input::get("txtCalificacion");
            $Autoeva->calificacionponderacionauto=Input::get("txtCalPonde");
            $Autoeva->riesgoasociadoauto=Input::get("txtRiesgoAso");
            $Autoeva->observacionauto=Input::get("txtObservaciones");
            $Autoeva->save();
            return redirect("autoevaluacion")->with('success','Editado correctamente');
        }
        catch(\Illuminate\Database\QueryException $ex)
        {
           // do task when error
            if($ex->getCode()==23000){
                return back()->with('error','Código ya ingresado anteriormente');
            }else{
                return back()->with('error','Se presento un error inesperado al agregar a Autoevaluación correctamente');
            }
           //dd($ex);   // insert query
        }
        //return redirect("portafolio");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Autoeva=App\Autoevaluacion::find($id);
            if (!is_null($Autoeva)) {
                $Autoeva->delete();
            }
            return redirect("autoevaluacion");
    }
}
