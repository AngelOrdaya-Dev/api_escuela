<?php

namespace App\Http\Controllers;

use App\Models\Profesor;
use Illuminate\Http\Request;

class ProfesorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Profesor::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->has('estado') && ! $request->has('estado_matricula')) {
            $request->merge(['estado_matricula' => $request->estado]);
        }

        if ($request->has('estado_matricula')) {
            $request->merge([
                'estado_matricula' => ucfirst(strtolower(trim($request->estado_matricula)))
            ]);
        }

        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'fecha_nacimiento' => 'required|string|max:255',
            'dni' => 'required|string|size:8|unique:profesores,dni',
            'direccion' => 'nullable|string|max:255',
            'telefono' => 'nullable|string|max:9',
            'email' => 'required|string|max:255|unique:profesores,email',
            'estado_matricula' => 'required|in:Activo,Inactivo',
            'especialidad' => 'required|string|max:255',
        ]);

        $profesor = Profesor::create($validated);

        return response()->json([
            'message' => 'Profesor creado exitosamente',
            'data' => $profesor
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $profesor = Profesor::findOrFail($id);
        return response()->json($profesor);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $profesor = Profesor::findOrFail($id);

        if ($request->has('estado') && ! $request->has('estado_matricula')) {
            $request->merge(['estado_matricula' => $request->estado]);
        }

        if ($request->has('estado_matricula')) {
            $request->merge([
                'estado_matricula' => ucfirst(strtolower(trim($request->estado_matricula)))
            ]);
        }

        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'fecha_nacimiento' => 'required|string|max:255',
            'dni' => 'required|string|size:8|unique:profesores,dni,' . $id . ',id_profesor',
            'direccion' => 'nullable|string|max:255',
            'telefono' => 'nullable|string|max:9',
            'email' => 'required|string|max:255|unique:profesores,email,' . $id . ',id_profesor',
            'estado_matricula' => 'required|in:Activo,Inactivo',
            'especialidad' => 'required|string|max:255',
        ]);

        $profesor->update($validated);

        return response()->json([
            'message' => 'Profesor actualizado exitosamente',
            'data' => $profesor
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $profesor = Profesor::findOrFail($id);
        $profesor->delete();

        return response()->json([
            'message' => 'Profesor eliminado exitosamente'
        ]);
    }
}
