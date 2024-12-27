<?php

namespace App\Http\Controllers;

use App\Models\FormationOccupation; // Modelo correspondiente a la tabla
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class FormationOccupationsController extends Controller
{
    // Crear un nuevo registro en la tabla formation_occupations
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'people_id' => 'required|integer|exists:people,people_id',
            'nivel_academico' => "required|in:Primaria,Básica Secundaria,Bachiller,Técnico,Tecnólogo,Universitario,Postgrado",
            'ocupacion' => "required|in:Empleado público,Empleado privado,Desempleado/a,Independiente",
            'nombre_empresa' => 'nullable|string|max:255',
        ]);

        // Crear el registro
        $formationOccupation = FormationOccupation::create($validated);

        return response()->json([
            'message' => 'Registro creado con éxito',
            'data' => $formationOccupation
        ], 201);
    }

    // Obtener todos los registros de la tabla
    public function index(): JsonResponse
    {
        $formationOccupations = FormationOccupation::all();
        return response()->json($formationOccupations);
    }

    // Obtener un registro específico por ID
    public function show($id): JsonResponse
    {
        $formationOccupation = FormationOccupation::findOrFail($id);
        return response()->json($formationOccupation);
    }

    // Actualizar un registro existente
    public function update(Request $request, $id): JsonResponse
    {
        $validated = $request->validate([
            'nivel_academico' => "nullable|in:Primaria,Básica Secundaria,Bachiller,Técnico,Tecnólogo,Universitario,Postgrado",
            'ocupacion' => "nullable|in:Empleado público,Empleado privado,Desempleado/a,Independiente",
            'nombre_empresa' => 'nullable|string|max:255',
        ]);

        $formationOccupation = FormationOccupation::findOrFail($id);
        $formationOccupation->update($validated);

        return response()->json([
            'message' => 'Registro actualizado con éxito',
            'data' => $formationOccupation
        ]);
    }

    // Eliminar un registro por ID
    public function destroy($id): JsonResponse
    {
        $formationOccupation = FormationOccupation::findOrFail($id);
        $formationOccupation->delete();

        return response()->json([
            'message' => 'Registro eliminado con éxito'
        ]);
    }
}
