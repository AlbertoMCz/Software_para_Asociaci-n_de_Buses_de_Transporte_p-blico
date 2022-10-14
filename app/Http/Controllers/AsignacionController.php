<?php

namespace App\Http\Controllers;

use App\Models\Asignacion;
use App\Models\Asignacion_sancion;
use App\Models\Chofer;
use App\Models\Micro;
use App\Models\Sancion;
use App\Models\Tipo_asignacion;
use Illuminate\Http\Request;

class AsignacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $asignaciones = Asignacion::all();
        return view('asignacion.index',compact('asignaciones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tipoAsignaciones = Tipo_asignacion::all();
        $micros = Micro::all();
        $choferes = Chofer::all();

        return view('asignacion.create',compact('tipoAsignaciones','micros', 'choferes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Asignacion::create($request->all());
        return redirect()->route('asignacion.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Asignacion $asignacion)
    {
        $tipoAsignaciones = Tipo_asignacion::all();
        $micros = Micro::all();
        $choferes = Chofer::all();
        $sanciones = Sancion::all();
        return view('asignacion.edit',compact('asignacion','tipoAsignaciones','micros', 'choferes','sanciones'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Asignacion $asignacion)
    {
        //return dd($request);
        request()->validate([
            'idTipoAsignacion'=>'required',
            'idMicro'=>'required',
            'idChofer'=>'required',
            'fechaInicio'=>'required',
            'fechaFin'=>'required',
            'rentaDiaria'=>'required',
            'pagoChofer'=>'required',
        ]);
        $asignacion->update($request->all());

        $asignacion_sancion= new Asignacion_sancion();
        $asignacion_sancion->id = $asignacion->id;
        $asignacion_sancion->idSancion = $request->get('idSancion');
        $asignacion_sancion->motivo = $request->get('motivo');
        $asignacion_sancion->save();

        //Asignacion_sancion::create($request->all()+['idAsignacion' => $asignacion->id]);
        return redirect()->route('asignacion.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Asignacion $asignacion)
    {
        $asignacion->delete();
        return redirect()->route('asignacion.index');
    }
}
