<?php

namespace Database\Seeders;

use App\Models\Rol as ModelsRol;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Rol extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ModelsRol::create([
            "nombre"=>"admin"
        ]);
        ModelsRol::create([
            "nombre"=>"supervisor"
        ]);
        ModelsRol::create([
            "nombre"=>"empleado"
        ]);
    }
}
