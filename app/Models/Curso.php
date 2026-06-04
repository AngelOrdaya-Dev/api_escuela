<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    protected $table = 'cursos';
    protected $primaryKey = 'id_curso';

    protected $fillable = [
        'nombre_curso',
        'creditos',
        'horas',
        'estado',
        'descripcion',
    ];

    public function horarios()
    {
        return $this->hasMany(Horario::class, 'id_curso', 'id_curso');
    }

    public function matriculas()
    {
        return $this->hasMany(Matricula::class, 'id_curso', 'id_curso');
    }
}
