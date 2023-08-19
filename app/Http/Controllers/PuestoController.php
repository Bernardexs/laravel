<?php

namespace App\Http\Controllers;

use App\Models\Puesto;
use Illuminate\Http\Request;

class PuestoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles=Puesto::all();
        return response()->json([
            "puestos"=>$roles
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
    public function show(Puesto $puesto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Puesto $puesto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Puesto $puesto)
    {
        //
    }
}
