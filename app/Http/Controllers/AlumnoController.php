<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Alumno::all());
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
            'dni' => 'required|string|size:8|unique:alumno,dni',
            'direccion' => 'nullable|string|max:255',
            'telefono' => 'nullable|string|max:9',
            'email' => 'required|string|max:255|unique:alumno,email',
            'estado_matricula' => 'required|in:Matriculado,Inactivo',
        ]);

        $alumno = Alumno::create($validated);

        return response()->json([
            'message' => 'Alumno creado exitosamente',
            'data' => $alumno
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $alumno = Alumno::findOrFail($id);
        return response()->json($alumno);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $alumno = Alumno::findOrFail($id);

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
            'dni' => 'required|string|size:8|unique:alumno,dni,' . $id . ',id_alumno',
            'direccion' => 'nullable|string|max:255',
            'telefono' => 'nullable|string|max:9',
            'email' => 'required|string|max:255|unique:alumno,email,' . $id . ',id_alumno',
            'estado_matricula' => 'required|in:Matriculado,Inactivo',
        ]);

        $alumno->update($validated);

        return response()->json([
            'message' => 'Alumno actualizado exitosamente',
            'data' => $alumno
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $alumno = Alumno::findOrFail($id);
        $alumno->delete();

        return response()->json([
            'message' => 'Alumno eliminado exitosamente'
        ]);
    }
}
