<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Empleado extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $fillable = [
        "user_id",
        "fecha_contratacion",
        "puesto_id",
        "salario_id",
     ];
     public function Usuario(): BelongsTo
     {
         return $this->BelongsTo(User::class,'user_id');
     }
     public function Puesto(): BelongsTo
     {
         return $this->BelongsTo(Puesto::class);
     }
     public function Salario(): BelongsTo
     {
         return $this->BelongsTo(Salario::class);
     }
     public function Asistencia(): HasMany
     {
         return $this->HasMany(Asistencia::class);
     }

}
