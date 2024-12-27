<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ContactController extends Controller
{
    // Crear un nuevo contacto
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'contact_id' => 'nullable|integer',
            'people_id' => 'required|integer|exists:people,people_id',
            'telefono_principal' => 'required|string|max:15',
            'telefono_secundario' => 'nullable|string|max:15',
            'correo_electronico' => 'nullable|email|max:255',
            'direccion_residencia' => 'nullable|string|max:255',
            'municipio' => 'nullable|string|max:100',
            'barrio_vereda' => 'nullable|string|max:100',
            'comuna_corregimiento' => 'nullable|string|max:100',
        ]);

        // Crear contacto con datos
        $contact = new Contact();
        $contact->contact_id = $validated['contact_id'] ?? null;
        $contact->people_id = $validated['people_id'];
        $contact->telefono_principal = $validated['telefono_principal'];
        $contact->telefono_secundario = $validated['telefono_secundario'] ?? null;
        $contact->correo_electronico = $validated['correo_electronico'] ?? null;
        $contact->direccion_residencia = $validated['direccion_residencia'] ?? null;
        $contact->municipio = $validated['municipio'] ?? null;
        $contact->barrio_vereda = $validated['barrio_vereda'] ?? null;
        $contact->comuna_corregimiento = $validated['comuna_corregimiento'] ?? null;

        // Guardar en la base de datos
        $contact->save();

        return response()->json([
            'message' => 'Contacto creado con éxito',
            'contact' => $contact
        ], 201);
    }

    // Obtener lista de contactos
    public function index(): JsonResponse
    {
        $contacts = Contact::all();
        return response()->json($contacts);
    }

    // Obtener un contacto por ID
    public function show($id): JsonResponse
    {
        $contact = Contact::findOrFail($id);
        return response()->json($contact);
    }

    // Actualizar un contacto
    public function update(Request $request, $id): JsonResponse
    {
        $validated = $request->validate([
            'telefono_principal' => 'sometimes|string|max:15',
            'telefono_secundario' => 'nullable|string|max:15',
            'correo_electronico' => 'nullable|email|max:255',
            'direccion_residencia' => 'nullable|string|max:255',
            'municipio' => 'nullable|string|max:100',
            'barrio_vereda' => 'nullable|string|max:100',
            'comuna_corregimiento' => 'nullable|string|max:100',
        ]);

        $contact = Contact::findOrFail($id);
        $contact->update($validated);

        return response()->json([
            'message' => 'Contacto actualizado con éxito',
            'contact' => $contact
        ]);
    }

    // Eliminar contacto
    public function destroy($id): JsonResponse
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return response()->json([
            'message' => 'Contacto eliminado con éxito'
        ]);
    }
}
