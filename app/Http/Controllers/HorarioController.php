<?php

namespace App\Http\Controllers;

use App\Models\Horario;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Horario::with('curso')->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_curso' => 'required|exists:cursos,id_curso',
            'dia_semana' => 'required|string|max:20',
            'hora_inicio' => 'required|string',
            'hora_fin' => 'required|string',
        ]);

        $horario = Horario::create($validated);
        $horario->load('curso');

        return response()->json([
            'message' => 'Horario creado exitosamente',
            'data' => $horario
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $horario = Horario::with('curso')->findOrFail($id);
        return response()->json($horario);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $horario = Horario::findOrFail($id);

        $validated = $request->validate([
            'id_curso' => 'required|exists:cursos,id_curso',
            'dia_semana' => 'required|string|max:20',
            'hora_inicio' => 'required|string',
            'hora_fin' => 'required|string',
        ]);

        $horario->update($validated);
        $horario->load('curso');

        return response()->json([
            'message' => 'Horario actualizado exitosamente',
            'data' => $horario
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $horario = Horario::findOrFail($id);
        $horario->delete();

        return response()->json([
            'message' => 'Horario eliminado exitosamente'
        ]);
    }
}
