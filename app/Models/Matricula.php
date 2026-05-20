<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    use HasFactory;

    protected $table = 'matriculas';
    protected $primaryKey = 'id_matricula';

    protected $fillable = [
        'id_alumno',
        'id_curso',
        'id_horario',
        'id_profesor',
        'semestre',
        'fecha_matricula',
        'nota_final',
        'estado',
    ];

    protected $casts = [
        'fecha_matricula' => 'date',
        'nota_final' => 'decimal:2',
    ];

    public function alumno()
    {
        return $this->belongsTo(Alumno::class, 'id_alumno', 'id_alumno');
    }

    public function curso()
    {
        return $this->belongsTo(Curso::class, 'id_curso', 'id_curso');
    }

    public function horario()
    {
        return $this->belongsTo(Horario::class, 'id_horario', 'id_horario');
    }

    public function profesor()
    {
        return $this->belongsTo(Profesor::class, 'id_profesor', 'id_profesor');
    }
}
