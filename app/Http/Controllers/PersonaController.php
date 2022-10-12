<?php

namespace App\Http\Controllers;

use App\Models\Chofer;
use App\Models\Persona;
use App\Models\Socio;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    /**
     * Función que trae y lista todos los registros de la tabla personas.
     */
    public function index()
    {
        $personas = Persona::all();
        return view('persona.index',compact('personas'));
    }

    /**
     * Muestra la interfaz gráfica donde se encuentra el formulario con los campos requeridos para registrar una persona.
     */
    public function create()
    {
        $tipoPersona = [
            'Socio' => 'S',
            'Chofer' => 'C'
        ];

        return view('persona.create',compact('tipoPersona'));
    }

    /**
     * Valida los datos obtenidos y guarda los datos en la tabla personas.
     */
    public function store(Request $request)
    {
        /*Opcion 1 para guardar un registro de manera manual*/

        $persona = new Persona();
        $persona->nombre = $request->get('nombre');
        $persona->apellido = $request->get('apellido');
        $persona->fechaNacimiento = $request->get('fechaNacimiento');
        $persona->ci = $request->get('ci');
        $persona->nacionalidad = $request->get('nacionalidad');
        $persona->genero = $request->get('genero');
        ($request->has('Socio') ? $persona->tipoPersona="S" : ($request->has('Chofer')) ? $persona->tipoPersona="C" : '');
        $persona->save();

        if ($request->has('Socio')){
            $socio = new Socio();
            $socio->id =$persona->id;
            $socio->codigo = $request->get('codigo');
            $socio->email = $request->get('email');
            $socio->save();
        }
        if ($request->has('Chofer')){
            $chofer= new Chofer();
            $chofer->id =$persona->id;
            $chofer->nroLicencia = $request->get('nroLicencia');
            $chofer->categoria = $request->get('categoria');
            $chofer->disponible = $request->get('disponible');
            $chofer->save();
        }

        /*Opcion 2 para guardar un registro*/
        //Persona::create($request->all());
        return redirect()->route('persona.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Persona $persona)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Persona $persona)
    {
        return view('persona.edit',compact('persona'));
    }

    /**
     * Actualiza los datos de la persona, insertados en el formulario de modificar.
     */
    public function update(Request $request, Persona $persona)
    {
        request()->validate([
            'nombre'=>'required',
            'apellido'=>'required',
            'fechaNacimiento'=>'required',
            'ci'=>'required',
            'genero'=>'required'
        ]);

        $persona->update($request->all());
        ($request->has('Socio') ? $persona->tipoPersona="S" : ($request->has('Chofer')) ? $persona->tipoPersona="C" : '');
        $persona->save();
        return redirect()->route('persona.index');
    }

    /**
     * Elimina un registro de persona de la base de datos
     */
    public function destroy(Persona $persona)
    {
        /*Opcion 1 para eliminar un registro */
        //Persona::find($persona)->delete();

        /*Opcion 2 para eliminar un registro */
        $persona->delete();
        return redirect()->route('persona.index');
    }
}
