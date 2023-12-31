<?php

namespace App\Http\Controllers;

use App\Models\Salario;
use Illuminate\Http\Request;

class SalarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles=Salario::all();
        return response()->json([
            "salarios"=>$roles
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Salario $salario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Salario $salario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Salario $salario)
    {
        //
    }
}
