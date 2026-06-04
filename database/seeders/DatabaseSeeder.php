<?php

namespace Database\Seeders;

use App\Models\Alumno;
use App\Models\Curso;
use App\Models\Profesor;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('matriculas')->truncate();
        Alumno::truncate();
        Profesor::truncate();
        Curso::truncate();
        Schema::enableForeignKeyConstraints();

        $cursos = [
            ['nombre_curso' => 'Matemáticas I', 'creditos' => 4, 'horas' => 80, 'estado' => 'activo', 'descripcion' => 'Fundamentos de álgebra y cálculo.'],
            ['nombre_curso' => 'Física I', 'creditos' => 4, 'horas' => 80, 'estado' => 'activo', 'descripcion' => 'Mecánica clásica y leyes del movimiento.'],
            ['nombre_curso' => 'Programación I', 'creditos' => 5, 'horas' => 100, 'estado' => 'activo', 'descripcion' => 'Introducción a la programación en Python.'],
            ['nombre_curso' => 'Química General', 'creditos' => 4, 'horas' => 80, 'estado' => 'activo', 'descripcion' => 'Bases de la química y reacciones químicas.'],
            ['nombre_curso' => 'Historia del Perú', 'creditos' => 3, 'horas' => 60, 'estado' => 'activo', 'descripcion' => 'Historia política y social del Perú moderno.'],
            ['nombre_curso' => 'Economía Básica', 'creditos' => 3, 'horas' => 60, 'estado' => 'activo', 'descripcion' => 'Principios de microeconomía y macroeconomía.'],
            ['nombre_curso' => 'Literatura', 'creditos' => 3, 'horas' => 60, 'estado' => 'activo', 'descripcion' => 'Análisis de obras literarias clásicas y contemporáneas.'],
            ['nombre_curso' => 'Inglés I', 'creditos' => 2, 'horas' => 40, 'estado' => 'activo', 'descripcion' => 'Comprensión y expresión en inglés básico.'],
            ['nombre_curso' => 'Biología', 'creditos' => 4, 'horas' => 80, 'estado' => 'activo', 'descripcion' => 'Estudio de organismos y sistemas vivos.'],
            ['nombre_curso' => 'Álgebra Lineal', 'creditos' => 4, 'horas' => 80, 'estado' => 'activo', 'descripcion' => 'Vectores, matrices y sistemas lineales.'],
        ];

        foreach ($cursos as $curso) {
            Curso::create($curso);
        }

        $profesores = [
            ['nombre' => 'Luis', 'apellidos' => 'García Pérez', 'fecha_nacimiento' => '1978-01-14', 'dni' => '12345670', 'direccion' => 'Av. Lima 123', 'telefono' => '987654321', 'email' => 'lgarcia@example.com', 'estado_matricula' => 'Activo', 'especialidad' => 'Matemáticas'],
            ['nombre' => 'María', 'apellidos' => 'Flores Rojas', 'fecha_nacimiento' => '1982-03-22', 'dni' => '23456781', 'direccion' => 'Calle 9 de Octubre 45', 'telefono' => '987654322', 'email' => 'mflores@example.com', 'estado_matricula' => 'Activo', 'especialidad' => 'Física'],
            ['nombre' => 'Carlos', 'apellidos' => 'Vargas Soto', 'fecha_nacimiento' => '1975-07-30', 'dni' => '34567892', 'direccion' => 'Jr. Amazonas 78', 'telefono' => '987654323', 'email' => 'cvargas@example.com', 'estado_matricula' => 'Activo', 'especialidad' => 'Programación'],
            ['nombre' => 'Ana', 'apellidos' => 'Torres Jiménez', 'fecha_nacimiento' => '1990-12-11', 'dni' => '45678903', 'direccion' => 'Psje. Los Álamos 12', 'telefono' => '987654324', 'email' => 'atorres@example.com', 'estado_matricula' => 'Activo', 'especialidad' => 'Química'],
            ['nombre' => 'Jorge', 'apellidos' => 'Salazar Huerta', 'fecha_nacimiento' => '1985-06-05', 'dni' => '56789014', 'direccion' => 'Av. Arequipa 455', 'telefono' => '987654325', 'email' => 'jsalazar@example.com', 'estado_matricula' => 'Activo', 'especialidad' => 'Historia'],
            ['nombre' => 'Verónica', 'apellidos' => 'Santos León', 'fecha_nacimiento' => '1988-09-18', 'dni' => '67890125', 'direccion' => 'Calle Real 34', 'telefono' => '987654326', 'email' => 'vsantos@example.com', 'estado_matricula' => 'Activo', 'especialidad' => 'Economía'],
            ['nombre' => 'Roberto', 'apellidos' => 'Mendoza Cruz', 'fecha_nacimiento' => '1979-11-02', 'dni' => '78901236', 'direccion' => 'Av. Brasil 112', 'telefono' => '987654327', 'email' => 'rmendoza@example.com', 'estado_matricula' => 'Activo', 'especialidad' => 'Literatura'],
            ['nombre' => 'Patricia', 'apellidos' => 'Quispe Choque', 'fecha_nacimiento' => '1984-05-26', 'dni' => '89012347', 'direccion' => 'Calle Los Pinos 67', 'telefono' => '987654328', 'email' => 'pquispe@example.com', 'estado_matricula' => 'Activo', 'especialidad' => 'Inglés'],
            ['nombre' => 'Miguel', 'apellidos' => 'Ramírez Delgado', 'fecha_nacimiento' => '1977-02-08', 'dni' => '90123458', 'direccion' => 'Jr. Tacna 99', 'telefono' => '987654329', 'email' => 'mramirez@example.com', 'estado_matricula' => 'Activo', 'especialidad' => 'Biología'],
            ['nombre' => 'Claudia', 'apellidos' => 'Paredes Morales', 'fecha_nacimiento' => '1992-08-19', 'dni' => '01234569', 'direccion' => 'Av. San Martín 210', 'telefono' => '987654330', 'email' => 'cparedes@example.com', 'estado_matricula' => 'Activo', 'especialidad' => 'Álgebra'],
        ];

        foreach ($profesores as $profesor) {
            Profesor::create($profesor);
        }

        $alumnos = [
            ['nombre' => 'Andrés', 'apellidos' => 'Pérez Díaz', 'fecha_nacimiento' => '2002-04-15', 'dni' => '11223344', 'direccion' => 'Av. Los Jardines 12', 'telefono' => '944112233', 'email' => 'andres.perez@example.com', 'estado_matricula' => 'Matriculado'],
            ['nombre' => 'Lucía', 'apellidos' => 'Martínez Salas', 'fecha_nacimiento' => '2001-10-22', 'dni' => '22334455', 'direccion' => 'Calle Falsa 123', 'telefono' => '944223344', 'email' => 'lucia.martinez@example.com', 'estado_matricula' => 'Matriculado'],
            ['nombre' => 'Diego', 'apellidos' => 'Rojas Vega', 'fecha_nacimiento' => '2003-02-05', 'dni' => '33445566', 'direccion' => 'Psje. Las Orquídeas 7', 'telefono' => '944334455', 'email' => 'diego.rojas@example.com', 'estado_matricula' => 'Matriculado'],
            ['nombre' => 'Sofía', 'apellidos' => 'Córdova Herrera', 'fecha_nacimiento' => '2002-12-01', 'dni' => '44556677', 'direccion' => 'Av. Primavera 89', 'telefono' => '944445566', 'email' => 'sofia.cordova@example.com', 'estado_matricula' => 'Matriculado'],
            ['nombre' => 'Javier', 'apellidos' => 'Sánchez Ruiz', 'fecha_nacimiento' => '2001-07-20', 'dni' => '55667788', 'direccion' => 'Calle del Sol 45', 'telefono' => '944556677', 'email' => 'javier.sanchez@example.com', 'estado_matricula' => 'Matriculado'],
            ['nombre' => 'Mariana', 'apellidos' => 'Flores Soto', 'fecha_nacimiento' => '2003-11-30', 'dni' => '66778899', 'direccion' => 'Jr. Las Palmas 56', 'telefono' => '944667788', 'email' => 'mariana.flores@example.com', 'estado_matricula' => 'Matriculado'],
            ['nombre' => 'Pablo', 'apellidos' => 'Núñez Luna', 'fecha_nacimiento' => '2002-06-18', 'dni' => '77889900', 'direccion' => 'Calle Nueva 90', 'telefono' => '944778899', 'email' => 'pablo.nunez@example.com', 'estado_matricula' => 'Matriculado'],
            ['nombre' => 'Camila', 'apellidos' => 'Álvarez Paz', 'fecha_nacimiento' => '2001-09-12', 'dni' => '88990011', 'direccion' => 'Av. Mar 34', 'telefono' => '944889900', 'email' => 'camila.alvarez@example.com', 'estado_matricula' => 'Matriculado'],
            ['nombre' => 'Tomás', 'apellidos' => 'Cornejo León', 'fecha_nacimiento' => '2003-03-03', 'dni' => '99001122', 'direccion' => 'Psje. El Sol 21', 'telefono' => '944990011', 'email' => 'tomas.cornejo@example.com', 'estado_matricula' => 'Matriculado'],
            ['nombre' => 'Daniela', 'apellidos' => 'Suárez Pinto', 'fecha_nacimiento' => '2002-01-28', 'dni' => '10111213', 'direccion' => 'Calle Alta 78', 'telefono' => '944101112', 'email' => 'daniela.suarez@example.com', 'estado_matricula' => 'Matriculado'],
        ];

        foreach ($alumnos as $alumno) {
            Alumno::create($alumno);
        }

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
