<?php

namespace App\Http\Controllers;

use App\Models\Micro;
use App\Models\Socio;
use Illuminate\Http\Request;

class MicroController extends Controller
{
    /**
     * Función que trae y lista todos los registros de la tabla micros.
     */
    public function index()
    {
        $micros = Micro::all();
        return view('micro.index',compact('micros'));
    }

    /**
     * Muestra la interfaz gráfica donde se encuentra el formulario con los campos requeridos para registrar un micro.
     */
    public function create()
    {
        $socios =Socio::all();
        return view('micro.create',compact('socios'));
    }

    /**
     * Valida los datos obtenidos y guarda los datos en la tabla micros.
     */
    public function store(Request $request)
    {
        Micro::create($request->all());
        return redirect()->route('micro.index');
    }

    /**
     * Muestra la interfaz grafica del formulario de edición para la actualizacion de los datos del micro.
     */
    public function edit(Micro $micro)
    {
        $socios =Socio::all();
        return view('micro.edit',compact('micro','socios'));
    }

    /**
     * Actualiza los datos del microbus, insertado en el formulario de modificar.
     */
    public function update(Request $request, Micro $micro)
    {
        //return dd($request);
        request()->validate([
            'nroPlaca'=>'required',
            'nroInterno'=>'required',
            'idSocio'=>'required',
        ]);
        $micro->update($request->all());
        ($request->disponible == 1)? '' : $micro->update(['disponible' => 0]);
        return redirect()->route('micro.index');
    }

    /**
     * Elimina un registro de un micro seleccionado de la base de datos.
     */
    public function destroy(Micro $micro)
    {
        $micro->delete();
        return redirect()->route('micro.index');
    }
}
