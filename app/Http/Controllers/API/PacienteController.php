<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ActualizarPacienteRequest;
use App\Http\Requests\GuardarPacienteRequest;
use App\Models\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'res' => true,
            'data' => Paciente::all(),
            'msg' => 'Paciente guardado exitosamente'
        ], 200);;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(GuardarPacienteRequest $request)
    {
        //TODO Hay error cuando no pasa la validación
        $paciente = Paciente::create($request->validated());

        return response()->json([
            'res' => true,
            'data' => $paciente,
            'msg' => 'Paciente guardado exitosamente'
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

    public function show(Paciente $paciente)
    {
        return response()->json([
            'res' => true,
            'paciente' => $paciente
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ActualizarPacienteRequest $request, Paciente $paciente)
    {
        $paciente = $paciente->update($request->validated());
        return response()->json([
            'res' => true,
            'data' => $paciente,
            'mesg' => 'Paciente actualizado con Exito'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paciente $paciente)
    {
        //No esta eliminando
        $paciente->delete();
        return response()->json([
            'res' => true,
            'mesg' => 'Paciente eliminado con Exito'
        ], 200);
    }
}
