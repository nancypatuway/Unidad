<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator; #para validaciones
use Illuminate\Support\Facades\Input; #para usar el input

use DB; 
use App\Http\Requests;
use App;

class ControllerPortafolios extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {//nombre de variable $users1 se puede cambiar es el parametro que llega en la vista.
        $PortafolioRiesgo = App\PortafolioRiesgo::all();
        
        //return view('paginas.portafolio')->with('users1',$users1);
        return view('paginas.portafolio', compact('PortafolioRiesgo'));
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
            $PortafolioRiesgo = new App\PortafolioRiesgo;
            $PortafolioRiesgo->codportafolio=Input::get("codporta");
            $PortafolioRiesgo->nombre=Input::get("nomporta");
            $PortafolioRiesgo->descripcion=Input::get("desporta");
            $PortafolioRiesgo->save();
            return back()->with('success','Aregado al portafolio correctamente');
        }
        catch(\Illuminate\Database\QueryException $ex)
        {
           // do task when error
            if($ex->getCode()==23000){
                return back()->with('error','Código ya ingresado anteriormente');
            }else{
                return back()->with('error','Se presento un error inesperado al agregar al portafolio');
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
        //$users1 = PortafolioRiesgo::all();
        $PortafolioRiesgo = App\PortafolioRiesgo::all();
        //return view('paginas.portafolio')->with('users1',$users1);
        return view('paginas.portafolio', compact('PortafolioRiesgo'));
    }

    public function show($id)
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
        $PortafolioRiesgo = App\PortafolioRiesgo::find($id);
        //$user = customer::find($id);
        return view('paginas/portafolioactualizar', compact('PortafolioRiesgo'));
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
            $PortafolioRiesgo = App\PortafolioRiesgo::find($id); //para buscar por id
            $PortafolioRiesgo->codportafolio=Input::get("codporta");
            $PortafolioRiesgo->nombre=Input::get("nomporta");
            $PortafolioRiesgo->descripcion=Input::get("desporta");
            $PortafolioRiesgo->save();
            return redirect("portafolio")->with('success','Se edito el registro correctamente');
        }
        catch(\Illuminate\Database\QueryException $ex)
        {
           // do task when error
            if($ex->getCode()==23000){
                return back()->with('error','Código ya ingresado anteriormente');
            }else{
                return back()->with('error','Se presento un error inesperado al agregar al portafolio');
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
        $PortafolioRiesgo=App\PortafolioRiesgo::find($id);
            if (!is_null($PortafolioRiesgo)) {
                $PortafolioRiesgo->delete();
            }
            return redirect("portafolio");
    }
}
