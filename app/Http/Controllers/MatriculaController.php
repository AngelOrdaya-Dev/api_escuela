<?php

namespace App\Http\Controllers;

use App\Models\Matricula;
use Illuminate\Http\Request;

class MatriculaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Matricula::with(['alumno', 'curso', 'horario', 'profesor'])->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_alumno' => 'required|exists:alumno,id_alumno',
            'id_curso' => 'required|exists:cursos,id_curso',
            'id_horario' => 'required|exists:horarios,id_horario',
            'id_profesor' => 'required|exists:profesores,id_profesor',
            'semestre' => 'required|string|max:20',
            'fecha_matricula' => 'required|string',
            'nota_final' => 'nullable|numeric',
            'estado' => 'required|in:aprobado,desaprobado,cursando',
        ]);

        $matricula = Matricula::create($validated);
        $matricula->load(['alumno', 'curso', 'horario', 'profesor']);

        return response()->json([
            'message' => 'Matrícula creada exitosamente',
            'data' => $matricula
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $matricula = Matricula::with(['alumno', 'curso', 'horario', 'profesor'])->findOrFail($id);
        return response()->json($matricula);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $matricula = Matricula::findOrFail($id);

        $validated = $request->validate([
            'id_alumno' => 'required|exists:alumno,id_alumno',
            'id_curso' => 'required|exists:cursos,id_curso',
            'id_horario' => 'required|exists:horarios,id_horario',
            'id_profesor' => 'required|exists:profesores,id_profesor',
            'semestre' => 'required|string|max:20',
            'fecha_matricula' => 'required|string',
            'nota_final' => 'nullable|numeric',
            'estado' => 'required|in:aprobado,desaprobado,cursando',
        ]);

        $matricula->update($validated);
        $matricula->load(['alumno', 'curso', 'horario', 'profesor']);

        return response()->json([
            'message' => 'Matrícula actualizada exitosamente',
            'data' => $matricula
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $matricula = Matricula::findOrFail($id);
        $matricula->delete();

        return response()->json([
            'message' => 'Matrícula eliminada exitosamente'
        ]);
    }
}
