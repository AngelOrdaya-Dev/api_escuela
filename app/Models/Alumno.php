<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;

    protected $table = 'alumno';
    protected $primaryKey = 'id_alumno';

    protected $fillable = [
        'nombre',
        'apellidos',
        'fecha_nacimiento',
        'dni',
        'direccion',
        'telefono',
        'email',
        'estado_matricula',
    ];

    protected $appends = ['estado'];

    protected $casts = [
        'fecha_nacimiento' => 'date',
    ];

    public function getEstadoAttribute(): string
    {
        return $this->estado_matricula;
    }

    public function matriculas()
    {
        return $this->hasMany(Matricula::class, 'id_alumno', 'id_alumno');
    }
}
