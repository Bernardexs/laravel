<?php

namespace Database\Seeders;

use App\Models\Salario as ModelsSalario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Salario extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ModelsSalario::create([
            "salario"=>"100.00"
        ]);
        ModelsSalario::create([
            "salario"=>"200.00"
        ]);
        ModelsSalario::create([
            "salario"=>"300.00"
        ]);
        ModelsSalario::create([
            "salario"=>"400.00"
        ]);
        ModelsSalario::create([
            "salario"=>"500.00"
        ]);
        ModelsSalario::create([
            "salario"=>"600.00"
        ]);
        ModelsSalario::create([
            "salario"=>"700.00"
        ]);
        ModelsSalario::create([
            "salario"=>"800.00"
        ]);
        ModelsSalario::create([
            "salario"=>"900.00"
        ]);
        ModelsSalario::create([
            "salario"=>"1000.00"
        ]);
        ModelsSalario::create([
            "salario"=>"1100.00"
        ]);
        ModelsSalario::create([
            "salario"=>"1200.00"
        ]);
    }
}
