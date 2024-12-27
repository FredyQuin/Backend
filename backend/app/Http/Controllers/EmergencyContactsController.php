<?php

namespace App\Http\Controllers;

use App\Models\EmergencyContact; // Modelo correspondiente a la tabla
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class EmergencyContactsController extends Controller
{
    // Crear un nuevo registro en la tabla emergency_contacts
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
        $emergencyContact = EmergencyContact::create($validated);

        return response()->json([
            'message' => 'Registro creado con éxito',
            'data' => $emergencyContact
        ], 201);
    }

    // Obtener todos los registros de la tabla
    public function index(): JsonResponse
    {
        $emergencyContacts = EmergencyContact::all();
        return response()->json($emergencyContacts);
    }

    // Obtener un registro específico por ID
    public function show($id): JsonResponse
    {
        $emergencyContact = EmergencyContact::findOrFail($id);
        return response()->json($emergencyContact);
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

        $emergencyContact = EmergencyContact::findOrFail($id);
        $emergencyContact->update($validated);

        return response()->json([
            'message' => 'Registro actualizado con éxito',
            'data' => $emergencyContact
        ]);
    }

    // Eliminar un registro por ID
    public function destroy($id): JsonResponse
    {
        $emergencyContact = EmergencyContact::findOrFail($id);
        $emergencyContact->delete();

        return response()->json([
            'message' => 'Registro eliminado con éxito'
        ]);
    }
}
