<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Asistencia extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        "fecha",
        "hora_entrada",
        "hora_salida",
        "horas_trabajadas",
        "horas_extra",
        "empleado_id"
    ];



    public function Empleado(): BelongsTo
    {
        return $this->belongsTo(Empleado::class);
    }
}
