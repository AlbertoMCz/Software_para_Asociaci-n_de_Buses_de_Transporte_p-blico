<?php

namespace App\Http\Controllers;

use App\Models\Sancion;
use Illuminate\Http\Request;

class SancionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sanciones = Sancion::all();
        return view('sancion.index',['sanciones'=>$sanciones]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('sancion.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

         $data = $request->validate([
            'detalle' => 'required',
            'montoApagar' => 'required',
        ],[
            'detalle.required'=>'El campo detalle es obligatorio.',
            'montoApagar.required'=>'El campo Monto a pagar es obligatorio.',
        ]);

        $sancion = new Sancion($data);
        $sancion->detalle = $request->input('detalle');
        $sancion->montoApagar = $request->input('montoApagar');
        $sancion->save();
        
        return redirect()->route('sancion.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sancion  $sancion
     * @return \Illuminate\Http\Response
     */
    public function show(Sancion $sancion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sancion  $sancion
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sancion = Sancion::findOrFail($id);
        return view('sancion.edit',['sancion'=>$sancion]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sancion  $sancion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $sancion = Sancion::findOrFail($id);
        $sancion->detalle = $request->input('detalle');
        $sancion->montoApagar = $request->input('montoApagar');
        $sancion->save();
        
        return redirect()->route('sancion.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sancion  $sancion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sancion = Sancion::findOrFail($id);
        $sancion->delete();
        
        return redirect()->route('sancion.index'); 
    }
}
