<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input; #para usar el input
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator; #para validaciones
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use DB; 
use App\Http\Requests;
use App;
use Response;
use App\EquipoVal;
use App\Planificacion;

class ControllerPlanificaciones extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $planificacion = Planificacion::all();
        $Equipoval = EquipoVal::all();
        
        return view('paginas.planificacion', compact('planificacion','Equipoval'));
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

    public function Descargar($id){
        $planificacion = App\Planificacion::find($id);
$cadena="";
foreach($planificacion->diagramaflujo as $byte){
    $cadena.=chr($byte);
}
$fichero = $_SERVER["DOCUMENT_ROOT"].'/bazaya-wms/pruebaPDF472.pdf';

file_put_contents($fichero, $cadena);
header("Content-Disposition: attachment; filename=" . urlencode('pruebaPDF472.pdf'));
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");
header("Content-Description: File Transfer");
header("Content-Length: " . filesize($cadena));
exit($cadena);
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
            //para validar el tipo
            if(Input::get("cbxTipo") == "---"){
                return redirect()->back()->with('error','Favor seleccionar un tipo proyecto o planificación')->withInput();
            }
        //$planificacion = lo que esta en la BD // DESPUES DEL GET LO QUE ESTA EN LA VISTA EL ID DE CADA INPUT
            $planificacion = new App\Planificacion;
            $planificacion->fecha=Input::get("txtFechaInicio");
            $planificacion->periodo=Input::get("txtPeriodo");
            $planificacion->codplanificacion=Input::get("txtcodigo");
            $planificacion->tipoplanificacion=Input::get("cbxTipo");
            $planificacion->nombre=Input::get("txtNombreProyectoProceso");
            $planificacion->objetivo=Input::get("txtobjetivo");
            //$planificacion->alineamiento=Input::get("txtAlineamientoEspe");
            $planificacion->condicionesexterno=Input::get("txtcondicionesExterno");
            $planificacion->condicionesinterno=Input::get("txtcondicionesExterno");
            $planificacion->sujetosrelacionados=Input::get("txtsujetos");
            $planificacion->areasrelacionadas=Input::get("txtdependencias");
            $planificacion->entradas=Input::get("txtEntradasInsumos");
            if(Input::hasfile("txtexampleInputFile")){
                $data = Input::file('txtexampleInputFile');
                $temp = file_get_contents($data);
                $blob = base64_encode($temp);
                $planificacion->diagramaflujo=$blob;
            }
            $planificacion->salida=Input::get("txtSalidasProductos");
            $planificacion->indicadoresproceso=Input::get("txtindicadores");
            $planificacion->normativainterna=Input::get("txtnormativaInterna");
            $planificacion->normativaexterna=Input::get("txtNormativaExterna");
            $planificacion->evaluacionesanteriores=Input::get("txtDEvaluacion");
            $planificacion->users_id=\Auth::user()->id;            
            $Token=$request->session()->get('identificador');
            $planificacion->token=$Token;
            $request->session()->forget('identificador');//$request->session()->flush();
            $planificacion->save();
            return back()->with('success','Aregado a Planificación correctamente');
        }
        catch(\Illuminate\Database\QueryException $ex)
        {
           // do task when error
            dd($ex);
            if($ex->getCode()==23000){
                return back()->with('error','Código ya ingresado anteriormente')->withInput(Input::all());
            }
            elseif ($ex->getCode()=='HY000' && str_contains($ex->getMessage(), "diagramaflujo")) {
                return back()->with('error','Debe agregar un diagrama de flujo')->withInput(Input::all());
            }
            else{
                return redirect()->back()->with('error','Se presento un error inesperado al agregar a planificación')->withInput();
            }
           dd($ex);   // insert query
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
        $planificacion = App\Planificacion::all();
        foreach ($planificacion as $pp) {
            $pp->diagramaflujo=base64_decode($pp->diagramaflujo);
        }
        return view('paginas.planificacion', compact('planificacion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $planificacion = App\Planificacion::find($id);
        $Ali = App\AliniamientoxPlanificacion::where('token',$planificacion->token)->get();
        return view('paginas.planificacionactualizar', compact('planificacion','Ali'));
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

            if(Input::get("cbxTipo") == "---"){
                    return redirect()->back()->with('error','Favor seleccionar un tipo proyecto o planificación')->withInput();
                }
            //$planificacion = lo que esta en la BD // DESPUES DEL GET LO QUE ESTA EN LA VISTA EL ID DE CADA INPUT
            $planificacion =  App\Planificacion::find($id);
            $planificacion->fecha=Input::get("txtFechaInicio");
            $planificacion->periodo=Input::get("txtPeriodo");
            $planificacion->codplanificacion=Input::get("txtcodigo");
            $planificacion->tipoplanificacion=Input::get("cbxTipo");
            $planificacion->nombre=Input::get("txtNombreProyectoProceso");
            $planificacion->objetivo=Input::get("txtobjetivo");
            //$planificacion->alineamiento=Input::get("txtAlineamientoEspe");
            $planificacion->condicionesexterno=Input::get("txtcondicionesExterno");
            $planificacion->condicionesinterno=Input::get("txtcondicionesExterno");
            $planificacion->sujetosrelacionados=Input::get("txtsujetos");
            $planificacion->areasrelacionadas=Input::get("txtdependencias");
            $planificacion->entradas=Input::get("txtEntradasInsumos");
            if(Input::hasfile("txtexampleInputFile")){
                $data = Input::file('txtexampleInputFile');
                $temp = file_get_contents($data);
                $blob = base64_encode($temp);
                $planificacion->diagramaflujo=$blob;
            }
            $planificacion->salida=Input::get("txtSalidasProductos");
            $planificacion->indicadoresproceso=Input::get("txtindicadores");
            $planificacion->normativainterna=Input::get("txtnormativaInterna");
            $planificacion->normativaexterna=Input::get("txtNormativaExterna");
            $planificacion->evaluacionesanteriores=Input::get("txtDEvaluacion");
            $planificacion->users_id=\Auth::user()->id;
            $planificacion->save();
            return redirect("planificacion")->with('success','Editado correctamente');
        }
        catch(\Illuminate\Database\QueryException $ex)
        {
           // do task when error
            if($ex->getCode()==23000){
                return back()->with('error','Código ya ingresado anteriormente')->withInput(Input::all());
            }
            elseif ($ex->getCode()=='HY000' && str_contains($ex->getMessage(), "diagramaflujo")) {
                return back()->with('error','Debe agregar un diagrama de flujo')->withInput(Input::all());
            }
            else{
                return redirect()->back()->with('error','Se presento un error inesperado al agregar a planificación')->withInput();
            }
           dd($ex);   // insert query
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
        $planificacion=App\Planificacion::find($id);
            if (!is_null($planificacion)) {
                $planificacion->delete();
            }
            return redirect("planificacion");
    }


    //controlador para meter los integrantes del equipo de valoracion

    public function storeEquipoval(Request $request)
    {
        try
        {
            dd(52);
            $Equipoval = new App\EquipoVal;
            $Equipoval->nombre=Input::get("txtEquipoval");

            $Equipoval->save();
            return back()->with('success','Aregado correctamente');

        }
        catch(\Illuminate\Database\QueryException $ex)
        {
           // do task when error
            //dd($ex);
            if($ex->getCode()==23000){
                return back()->with('error','Nombre ya ingresado anteriormente')->withInput(Input::all());
            }
            else{
                return redirect()->back()->with('error','Se presento un error inesperado al agregar')->withInput();
            }
           dd($ex);   // insert query
       }
   }

   public function showallEquipoval()
    {
        $Equipoval = App\EquipoVal::all();
        return view('paginas.planificacion', compact('Equipoval'));
    }

   public function destroyEquipoval($id)
    {
        $Equipoval=App\EquipoVal::find($id);
            if (!is_null($Equipoval)) {
                $Equipoval->delete();
            }
            return redirect("Equipoval");
    }
}