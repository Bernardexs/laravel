<?php

namespace Database\Seeders;

use App\Models\Puesto as ModelsPuesto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Puesto extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ModelsPuesto::create([
            "nombre"=>"Diseño"
        ]);
        ModelsPuesto::create([
            "nombre"=>"Experiencia de usuario"
        ]);
        ModelsPuesto::create([
            "nombre"=>"Desarrollador Front end"
        ]);
        ModelsPuesto::create([
            "nombre"=>"Desarrollador Back end"
        ]);
        ModelsPuesto::create([
            "nombre"=>"Base de datos "
        ]);
        ModelsPuesto::create([
            "nombre"=>"Full stack"
        ]);
    }
}
