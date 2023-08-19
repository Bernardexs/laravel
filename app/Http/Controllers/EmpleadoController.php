<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmpleadoController extends Controller
{
    private $rules = array(
        'nombre' => 'required',
        'apellido' => 'required',
        'direccion' => 'required',
        'cedula' => 'required',
        'email' => 'required|email',
        'password' => 'required',
        'fecha_contratacion' => 'required|date',
        'puesto_id' => 'required',
        'rol_id' => 'required',
        'salario_id' => 'required',
    );

    private $messages = array(
        'nombre.required' => 'El nombre es requerido.',
        'apellido.required' => 'El apellido es requerido.',
        'direccion.required' => 'La dirección es requerida.',
        'cedula.required' => 'La cédula es requerida.',
        'email.required' => 'El email es requerido.',
        'email.email' => 'Debe ser un correo electrónico válido.',
        'password.required' => 'La contraseña es requerida.',
        'fecha_contratacion.required' => 'La fecha de contratación es requerida.',
        'fecha_contratacion.date' => 'Debe ser una fecha válida.',
        'puesto_id.required' => 'El ID de puesto es requerido.',
        'rol_id.required' => 'El ID de rol es requerido.',
        'salario_id.required' => 'El ID de salario es requerido.',
    );

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empleados = Empleado::with('Usuario')->get();
        return response()->json([
            "empleados" => $empleados
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
        $user = User::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'direccion' => $request->direccion,
            'cedula' => $request->cedula,
            'rol_id' =>$request->rol_id,
        ]);
        Empleado::create([
            "user_id" => $user->id,
            "fecha_contratacion" => $request->fecha_contratacion,
            "puesto_id" => $request->puesto_id,
            "salario_id" => $request->salario_id
        ]);
        return response()->json([
            "message" => "empelado creado correctamente"
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Empleado $empleado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Empleado $empleado)
    {
        //
    }
}
