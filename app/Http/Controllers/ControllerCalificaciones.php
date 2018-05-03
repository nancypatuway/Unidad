<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator; #para validaciones
use Illuminate\Support\Facades\Input; #para usar el input
use DB; 
use App\Http\Requests;
use App;

class ControllerCalificaciones extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //segunda tabla de la vista anayeva con todos sus controldores

    public function index()
    {
        $anayeva2 = App\AnayEva::all();
        return $anayeva2;
        //return view('paginas.anayeva', compact('Anayeva2'));
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

            $Anayeva2 = new App\AnayEva;
            $Anayeva2->probablidad = Input::get("cbxProbabilidad");
            $Anayeva2->impacto = Input::get("cbxImpacto");
            $Anayeva2->promprobabilidad = Input::get("txtPromProba"); 
            $Anayeva2->promimpacto = Input::get("txtPromImpa");
            $Anayeva2->riesgoinherente = Input::get("txtRiesInh");

            $Anayeva2->save();
            return redirect("anayeva")->with('success','Editado correctamente');
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
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showall($id)
    {
        $Anayeva2 = App\AnayEva::all();
        return view('paginas.anayeva', compact('Anayeva2'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Anayeva2 = App\AnayEva::find($id);
        return view('paginas.anayevaactualizar', compact('Anayeva2'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function update(Request $request, $id)
    {
        $Anayeva2 = App\AnayEva::find($id);
        $Anayeva2->probablidad = Input::get("cbxProbabilidad");
        $Anayeva2->impacto = Input::get("cbxImpacto");
        $Anayeva2->promprobabilidad = Input::get("txtPromProba"); 
        $Anayeva2->promimpacto = Input::get("txtPromImpa");
        $Anayeva2->riesgoinherente = Input::get("txtRiesInh");

        $Anayeva->save();
        return redirect("anayeva")->with('success','Editado correctamente');
    }

    /**
     * Remove the specifi     * @return \Illuminate\Http\Response
ed resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Anayeva2=App\AnayEva::find($id);
            if (!is_null($Anayeva2)) {
                $Anayeva2->delete();
            }
            return redirect("anayeva");

    }

}
