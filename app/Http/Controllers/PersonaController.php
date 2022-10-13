<?php

namespace App\Http\Controllers;

use App\Models\Chofer;
use App\Models\Persona;
use App\Models\Socio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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
        $genero = collect([
            ['abreviatura' => 'M', 'tipo' => 'Masculino'],
            ['abreviatura' => 'F', 'tipo' => 'Femenino'],
        ]);

        $socios = Socio::all();
        $generos = ['M' => 'Masculino', 'F' => 'Femenino'];
        $generos = collect($generos);

        return view('persona.create',compact('socios','generos'));
    }

    /**
     * Valida los datos obtenidos y guarda los datos en la tabla personas.
     */
    public function store(Request $request)
    {
        //return dd($request);
        /*Opcion 1 para guardar un registro de manera manual
        $persona = new Persona();
        $persona->nombre = $request->get('nombre');
        $persona->apellido = $request->get('apellido');
        $persona->fechaNacimiento = $request->get('fechaNacimiento');
        $persona->ci = $request->get('ci');
        $persona->nacionalidad = $request->get('nacionalidad');
        $persona->genero = $request->get('genero');
        ($request->has('Socio') ? $persona->tipoPersona="S" : ($request->has('Chofer')) ? $persona->tipoPersona="C" : '');
        $persona->save();
        */

        /*Opcion 2 para guardar un registro*/
        $persona = Persona::create($request->all());

        if ($persona->tipoPersona=="S"  ){
            $socio = new Socio();
            $socio->id =$persona->id;
            $socio->codigo = $request->get('codigo');
            $socio->email = $request->get('email');
            $socio->save();
        }elseif ($persona->tipoPersona=="C"){
            $chofer= new Chofer();
            $chofer->id =$persona->id;
            $chofer->nroLicencia = $request->get('nroLicencia');
            $chofer->categoria = $request->get('categoria');
            $chofer->disponible = $request->get('disponible');
            $chofer->save();
        }
        return redirect()->route('persona.index');
    }

    /**
     * Show the form for editing the specified resource. 1319005
     */
    public function edit(Persona $persona)
    {
        $generos = ['M' => 'Masculino', 'F' => 'Femenino'];
        $generos = collect($generos);

        $socio = Socio::where('id','=', $persona->id)->first();
        $chofer = Chofer::where('id','=', $persona->id)->first();

        $personaCargo = DB::table('personas')
            ->join('socios', 'socios.id', '=', 'personas.id')
            ->join('chofers', 'chofers.id', '=', 'personas.id')
            ->where('personas.id', '=', $persona);

        return view('persona.edit',compact('persona', 'generos','socio','chofer'));
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

        $socio = Socio::find($persona->id);
        $chofer = Chofer::find($persona->id);
        ($socio)? $socio->delete(): '';
        ($chofer)? $chofer->delete(): '';

        (Str::startsWith($request->tipoPersona, 'S') Or (Str::startsWith($request->tipoPersona, 'C')))? '' : $persona->update(['tipoPersona' => null]);
        //$persona->update($request->tipoPersona)

        if(Str::startsWith($request->tipoPersona, 'S')){
            Socio::create($request->all()+['id' => $persona->id]);
        }elseif (Str::startsWith($request->tipoPersona, 'C')){
            Chofer::create($request->all()+['id' => $persona->id]);
        }

            //(Str::startsWith($request->tipoPersona, 'S'))? Socio::create($request->all()+['id' => $persona->id]) : (Str::startsWith($request->tipoPersona, 'C'))? Chofer::create($request->all()+['id' => $persona->id]) : '';
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
