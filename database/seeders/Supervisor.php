<?php

namespace Database\Seeders;

use App\Models\Empleado;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Supervisor extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user=User::create([
            'nombre'=>"Pedro Pepito",
        'apellido'=>"Vera Mera",
        'email'=>"pedro@hotmail.com",
        'password'=>bcrypt("pedro123"),
        'direccion'=>"via tosagua",
        'cedula'=>"1412534222",
        ]);
        Empleado::create([
            "user_id"=>$user->id,
            "fecha_contratacion"=>"2020-11-11",
            "puesto_id"=>1,
            "rol_id"=>2,
            "salario_id"=>4,
        ]);
    }
}
