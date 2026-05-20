<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    use HasFactory;

    protected $table = 'profesores';
    protected $primaryKey = 'id_profesor';

    protected $fillable = [
        'nombre',
        'apellidos',
        'fecha_nacimiento',
        'dni',
        'direccion',
        'telefono',
        'email',
        'estado_matricula',
        'especialidad',
    ];

    protected $casts = [
        'fecha_nacimiento' => 'date',
    ];

    public function matriculas()
    {
        return $this->hasMany(Matricula::class, 'id_profesor', 'id_profesor');
    }
}
