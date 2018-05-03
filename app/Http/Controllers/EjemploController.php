<?php

namespace App\Http\Controllers;

use App\Ejemplo;
use Illuminate\Http\Request;
use App\EquipoVal;
use App\Planificacion;

class EjemploController extends Controller
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
         
        return view('paginas.ejemplo',compact('planificacion','Equipoval'));
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
     * @param  \App\Ejemplo  $ejemplo
     * @return \Illuminate\Http\Response
     */
    public function show(Ejemplo $ejemplo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ejemplo  $ejemplo
     * @return \Illuminate\Http\Response
     */
    public function edit(Ejemplo $ejemplo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ejemplo  $ejemplo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ejemplo $ejemplo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ejemplo  $ejemplo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ejemplo $ejemplo)
    {
        //
    }
}
