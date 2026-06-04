<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Curso::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre_curso' => 'required|string|max:255',
            'creditos' => 'required|integer|min:1',
            'horas' => 'required|integer|min:1',
            'estado' => 'nullable|string|in:activo,inactivo',
            'descripcion' => 'nullable|string',
        ]);

        $curso = Curso::create($validated);

        return response()->json([
            'message' => 'Curso creado exitosamente',
            'data' => $curso
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $curso = Curso::findOrFail($id);
        return response()->json($curso);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $curso = Curso::findOrFail($id);

        $validated = $request->validate([
            'nombre_curso' => 'required|string|max:255',
            'creditos' => 'required|integer|min:1',
            'horas' => 'required|integer|min:1',
            'estado' => 'nullable|string|in:activo,inactivo',
            'descripcion' => 'nullable|string',
        ]);

        $curso->update($validated);

        return response()->json([
            'message' => 'Curso actualizado exitosamente',
            'data' => $curso
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $curso = Curso::findOrFail($id);
        $curso->delete();

        return response()->json([
            'message' => 'Curso eliminado exitosamente'
        ]);
    }
}
