<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person; 
use App\Models\Sex;    
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
                'qr_code_path' => 'nullable|string|max:255',
                'lugar_expedicion' => 'nullable|string|max:255',
                'primer_apellido' => 'required|string|max:255',
                'segundo_apellido' => 'nullable|string|max:255',
                'fecha_nacimiento' => 'nullable|date',
                'nacionalidad' => 'nullable|string|max:255',
                'sexo' => 'required|in:masculino,femenino', 
            ]);

            // Crear la persona en la tabla people usando el people_id proporcionado
            $person = Person::create([
                'people_id' => $request->people_id,
                'tipo_documento' => $request->tipo_documento,
                'nombres_completos' => $request->nombres_completos,
                'correo' => $request->correo,
                'qr_code_path' => $request->qr_code_path,
                'lugar_expedicion' => $request->lugar_expedicion,
                'primer_apellido' => $request->primer_apellido,
                'segundo_apellido' => $request->segundo_apellido,
                'fecha_nacimiento' => $request->fecha_nacimiento,
                'nacionalidad' => $request->nacionalidad,
            ]);

            $sex = Sex::create([
                'people_id' => $request->people_id,
                'sexo' => $request->sexo,
            ]);

            DB::commit();

            return response()->json([
                'message' => 'Persona creada exitosamente',
                'data' => [
                    'person' => $person,
                    'sex' => $sex,
                ]
            ], 201);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'error' => 'Error al crear la persona',
                'details' => $e->getMessage()
            ], 500);
        }
    }

    // Método para listar todas las personas
    public function index()
    {
        $people = Person::with('sex')->get(); // Incluye la relación con sex
        return response()->json($people, 200);
    }

    // Método para mostrar una persona por ID
    public function show($id)
    {
        $person = Person::with('sex')->find($id); // Incluye la relación con sex

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
                'qr_code_path' => 'nullable|string|max:255',
                'lugar_expedicion' => 'nullable|string|max:255',
                'primer_apellido' => 'required|string|max:255',
                'segundo_apellido' => 'nullable|string|max:255',
                'fecha_nacimiento' => 'nullable|date',
                'nacionalidad' => 'nullable|string|max:255',
                'sexo' => 'required|in:masculino,femenino',
            ]);

            // Actualizar los datos en la tabla people
            $person->update($request->only([
                'tipo_documento',
                'nombres_completos',
                'correo',
                'qr_code_path',
                'lugar_expedicion',
                'primer_apellido',
                'segundo_apellido',
                'fecha_nacimiento',
                'nacionalidad',
            ]));

            // Actualizar el registro en la tabla sex
            $person->sex->update([
                'sexo' => $request->sexo,
            ]);

            DB::commit();

            return response()->json([
                'message' => 'Persona actualizada exitosamente',
                'data' => $person->load('sex')
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'error' => 'Error al actualizar la persona',
                'details' => $e->getMessage()
            ], 500);
        }
    }

    // Método para eliminar una persona
    public function destroy($id)
    {
        $person = Person::find($id);

        if (!$person) {
            return response()->json(['error' => 'Persona no encontrada'], 404);
        }

        DB::beginTransaction();

        try {
            // Eliminar el registro relacionado en sex
            $person->sex()->delete();

            // Eliminar el registro en people
            $person->delete();

            DB::commit();

            return response()->json(['message' => 'Persona eliminada exitosamente'], 200);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'error' => 'Error al eliminar la persona',
                'details' => $e->getMessage()
            ], 500);
        }
    }
}
