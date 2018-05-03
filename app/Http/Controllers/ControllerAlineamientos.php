<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator; #para validaciones
use Illuminate\Support\Facades\Input; #para usar el input
use DB; 
use App\Http\Requests;
use App;

class ControllerAlineamientos extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //nombre de variable $users1 se puede cambiar es el parametro que llega en la vista.
        $Token=$request->session()->get('identificador');
        $Ali = App\AliniamientoxPlanificacion::where('token',$Token)->get();
        $planificacion = App\Planificacion::all();
        //dd($Token);
        return view('paginas.planificacion', compact('Ali','planificacion'));
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
    public function store(Request $request,$detalle,$token)
    {
        try{
                //$pesoxplangestion = lo que esta en la BD // DESPUES DEL GET LO QUE ESTA EN LA VISTA EL ID DE CADA INPUT
            //$request->session()->forget('Token' );
            //$request->session()->flush();
            if($token=='session')
                $Token=$request->session()->get('identificador');
            else
                $Token=$token;
            //dd($Token);
            $Ali = new App\AliniamientoxPlanificacion;
            $Ali->alineamientoconobjetivo=$detalle;
            
            if (empty($Token)){
                $Token=self::generateRandomString();
                $var=App\Planificacion::where('token',$Token)->first();
                if (!is_null($var))
                    while($Token==App\Planificacion::where('token',$Token)->first()->token)
                        $Token=self::generateRandomString();
                $Ali->token=$Token;
            }
            else    {
                //$Token=$request->session()->get('Token');
                $Ali->token=$Token;
            }
            $Ali->save();
            \Session::flash('flash_message','Actividad Ingresada'.$Token);
            //\Session::flash('Token',$Token);
            if($token=='session')
                $request->session()->put('identificador',$Token );
            //session(['Token' => $Token]);
            return back();
            }
            catch(\Illuminate\Database\QueryException $ex)
            {
               // do task when error
                dd($ex);
                if($ex->getCode()==23000){
                    return back()->with('error','Código ya ingresado anteriormente');
                }else{
                    return back()->with('error','Se presento un error inesperado al agregar');
                }
               //dd($ex);   // insert query
            }
        //return redirect("plangestion");
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Ali = App\AliniamientoxPlanificacion::all();
        return view('paginas.planificacion', compact('Ali'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }
//para generar el token
        static function generateRandomString($length = 10) {
        $characters = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
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
        $Ali=App\AliniamientoxPlanificacion::find($id);
            if (!is_null($Ali)) {
                $Ali->delete();
            }
            return back();
    }
}
