<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person; 
use Illuminate\Support\Facades\DB;

class PersonController extends Controller
{
    // Método para crear una nueva persona
    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            // Validar la información
            $request->validate([
                'people_id' => 'required|integer|unique:people,people_id',
                'tipo_documento' => 'required|in:registro civil,tarjeta de identidad,cedula de ciudadania,cedula de extranjeria,permiso especial de permanencia',
                'nombres_completos' => 'required|string|max:255',
                'correo' => 'nullable|email|max:255',
                'genero' => 'required|in:Masculino,Femenino,Otro,Prefiero no decirlo',
                'qr_code_path' => 'nullable|string|max:255',
                'lugar_expedicion' => 'nullable|string|max:255',
                'primer_apellido' => 'required|string|max:255',
                'segundo_apellido' => 'nullable|string|max:255',
                'fecha_nacimiento' => 'nullable|date',
                'nacionalidad' => 'nullable|string|max:255',
            ]);

            // Crear la persona
            $person = Person::create($request->only([
                'people_id',
                'tipo_documento',
                'nombres_completos',
                'correo',
                'genero',
                'qr_code_path',
                'lugar_expedicion',
                'primer_apellido',
                'segundo_apellido',
                'fecha_nacimiento',
                'nacionalidad',
            ]));

            DB::commit();

            return response()->json(['message' => 'Persona creada exitosamente', 'data' => $person], 201);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json(['error' => 'Error al crear la persona', 'details' => $e->getMessage()], 500);
        }
    }

    // Método para listar todas las personas
    public function index()
    {
        $people = Person::all();
        return response()->json($people, 200);
    }

    // Método para mostrar una persona por ID
    public function show($id)
    {
        $person = Person::find($id);

        if (!$person) {
            return response()->json(['error' => 'Persona no encontrada'], 404);
        }

        return response()->json($person, 200);
    }

    // Método para actualizar una persona
    public function update(Request $request, $id)
    {
        DB::beginTransaction();

        try {
            $person = Person::find($id);

            if (!$person) {
                return response()->json(['error' => 'Persona no encontrada'], 404);
            }

            // Validar la información
            $request->validate([
                'tipo_documento' => 'required|in:registro civil,tarjeta de identidad,cedula de ciudadania,cedula de extranjeria,permiso especial de permanencia',
                'nombres_completos' => 'required|string|max:255',
                'correo' => 'nullable|email|max:255',
                'genero' => 'required|in:Masculino,Femenino,Otro,Prefiero no decirlo',
                'qr_code_path' => 'nullable|string|max:255',
                'lugar_expedicion' => 'nullable|string|max:255',
                'primer_apellido' => 'required|string|max:255',
                'segundo_apellido' => 'nullable|string|max:255',
                'fecha_nacimiento' => 'nullable|date',
                'nacionalidad' => 'nullable|string|max:255',
            ]);

            // Actualizar los datos
            $person->update($request->only([
                'tipo_documento',
                'nombres_completos',
                'correo',
                'genero',
                'qr_code_path',
                'lugar_expedicion',
                'primer_apellido',
                'segundo_apellido',
                'fecha_nacimiento',
                'nacionalidad',
            ]));

            DB::commit();

            return response()->json(['message' => 'Persona actualizada exitosamente', 'data' => $person], 200);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json(['error' => 'Error al actualizar la persona', 'details' => $e->getMessage()], 500);
        }
    }

    // Método para eliminar una persona
    public function destroy($id)
    {
        $person = Person::find($id);

        if (!$person) {
            return response()->json(['error' => 'Persona no encontrada'], 404);
        }

        $person->delete();
        return response()->json(['message' => 'Persona eliminada exitosamente'], 200);
    }
}
