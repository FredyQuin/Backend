<?php

namespace App\Http\Controllers;

use App\Models\Emergency; // Cambiado al modelo correcto
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class EmergencyController extends Controller
{
    // Crear un nuevo registro en la tabla emergency
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'people_id' => 'required|integer|exists:people,people_id',
            'blood_type' => 'nullable|string|max:255',
            'contact_name' => 'nullable|string|max:255',
            'contact_phone' => 'nullable|string|max:255',
            'contact_relationship' => 'nullable|string|max:255',
        ]);

        // Crear el registro
        $emergency = Emergency::create($validated);

        return response()->json([
            'message' => 'Registro creado con éxito',
            'data' => $emergency,
        ], 201);
    }

    // Obtener todos los registros de la tabla
    public function index(): JsonResponse
    {
        $emergencies = Emergency::all();
        return response()->json($emergencies);
    }

    // Obtener un registro específico por ID
    public function show($id): JsonResponse
    {
        $emergency = Emergency::findOrFail($id);
        return response()->json($emergency);
    }

    // Actualizar un registro existente
    public function update(Request $request, $id): JsonResponse
    {
        $validated = $request->validate([
            'blood_type' => 'nullable|string|max:255',
            'contact_name' => 'nullable|string|max:255',
            'contact_phone' => 'nullable|string|max:255',
            'contact_relationship' => 'nullable|string|max:255',
        ]);

        $emergency = Emergency::findOrFail($id);
        $emergency->update($validated);

        return response()->json([
            'message' => 'Registro actualizado con éxito',
            'data' => $emergency,
        ]);
    }

    // Eliminar un registro por ID
    public function destroy($id): JsonResponse
    {
        $emergency = Emergency::findOrFail($id);
        $emergency->delete();

        return response()->json([
            'message' => 'Registro eliminado con éxito',
        ]);
    }
}
