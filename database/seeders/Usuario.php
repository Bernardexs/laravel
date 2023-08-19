<?php

namespace Database\Seeders;

use App\Models\Empleado;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Usuario extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'nombre'=>"Bernardo Pedro",
        'apellido'=>"Salazar Santiago",
        'email'=>"admin@hotmail.com",
        'password'=>bcrypt("admin123"),
        'direccion'=>"via la bonita",
        'cedula'=>"1412534654",
        ]);

    }
}
