<?php

namespace App\Http\Controllers;

use App\Models\Tipo_asignacion;
use Illuminate\Http\Request;

class Tipo_asignacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipoAsignaciones = Tipo_asignacion::all();
        return view('tipoAsignacion.index',['tipoAsignaciones'=>$tipoAsignaciones]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipoAsignacion.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tipoAsignacion = new Tipo_asignacion();
        $tipoAsignacion->nombre = $request->input('nombre');
        $tipoAsignacion->detalle = $request->input('detalle');
        $tipoAsignacion->save();

        return redirect()->route('tipoAsignacion.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
        $tipoAsignacion = Tipo_asignacion::findOrFail($id);
        return view('tipoAsignacion.edit',['tipoAsignacion'=>$tipoAsignacion]);
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
        $tipoAsignacion = Tipo_asignacion::findOrFail($id);
        $tipoAsignacion->nombre = $request->input('nombre');
        $tipoAsignacion->detalle = $request->input('detalle');
        $tipoAsignacion->save();

        return redirect()->route('tipoAsignacion.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipoAsignacion = Tipo_asignacion::findOrFail($id);
        $tipoAsignacion->delete();

        return redirect()->route('tipoAsignacion.index');
    }
}
