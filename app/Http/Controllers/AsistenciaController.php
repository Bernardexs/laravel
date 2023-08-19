<?php

namespace App\Http\Controllers;

use App\Models\Asistencia;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AsistenciaController extends Controller
{
    private $rules = array(
        'fecha' => 'required|date',
        'hora_entrada' => 'required|date_format:H:i:s',
        'hora_salida' => 'required|date_format:H:i:s',
        'empleado_id' => 'required',
    );

    private $messages = array(
        'fecha.required' => 'La fecha es requerida.',
        'fecha.date' => 'Debe ser una fecha válida.',
        'hora_entrada.required' => 'La hora de entrada es requerida.',
        'hora_entrada.date_format' => 'Debe ser un formato de hora válido (HH:MM:SS).',
        'hora_salida.required' => 'La hora de salida es requerida.',
        'hora_salida.date_format' => 'Debe ser un formato de hora válido (HH:MM:SS).',
        'empleado_id.required' => 'El ID de empleado es requerido.',
    );

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $asistencias = Asistencia::with('Puesto', 'Rol', 'Salario', 'Empleado.Usuario.Rol')->get();
        return response()->json([
            "asistencias" => $asistencias
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), $this->rules, $this->messages);
        if ($validator->fails()) {
            $messages = $validator->messages();
            return response()->json(["messages" => $messages], 500);
        }
        $horasTrabajadas = Carbon::parse($request->hora_entrada)->diffInHours(Carbon::parse($request->hora_salida));
        $horasExtras = max($horasTrabajadas - 8, 0);
        Asistencia::create([
            "fecha" => $request->fecha,
            "hora_entrada" => $request->hora_entrada,
            "hora_salida" => $request->hora_salida,
            "horas_trabajadas" => $horasTrabajadas,
            "horas_extra" => $horasExtras,
            "empleado_id" => $request->empleado_id
        ]);
        return response()->json([
            "message" => "asistencia creada"
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Asistencia $asistencia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Asistencia $asistencia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Asistencia $asistencia)
    {
        //
    }
}
