<?php

namespace App\Http\Controllers;

use App\Models\DifferentialFocus;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class DifferentialFocusController extends Controller
{
    // Crear un nuevo registro en la tabla differential_focus
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'people_id' => 'required|integer|exists:people,people_id',
            'focus_name' => "required|in:reintegrado,desmovilizado,extrema pobreza,poblacion victima del conflicto armado,poblacion LGBTIQ,
            personas en condicion de discapacidad,mujeres cabeza de familia,adultos mayores,ninos ninas y adolecentes",
            'grupo_etnico' => "required|in:Negro, Afrocolombiano, raizal o palanquero (NARP),Otro,Ninguno",
            'acreditacion_grupo_etnico' => 'nullable|string|max:255',
            'certificado_discapacidad' => 'required|boolean',
            'tipo_discapacidad' => "nullable|in:Fisica,Auditiva,Visual,Intelectual",
            'cuidador_cuidadora' => 'required|boolean',
            'campesino_campesina' => 'required|boolean',
            'victima_conflicto' => 'required|boolean',
            'reincorporacion_reintegracion' => 'required|boolean',
            'madre_cabeza_familia' => 'required|boolean',
            'madre_gestante_lactante' => 'required|boolean',
            'sisben' => 'nullable|in:A,B,C,D,Ninguno',
        ]);
        
        \Log::info($validated); // Para registrar los datos validados
        

        // Crear el registro
        try {
            $differentialFocus = DifferentialFocus::create($validated);
        
            return response()->json([
                'message' => 'Registro creado con éxito',
                'data' => $differentialFocus
            ], 201);
        } catch (\Exception $e) {
            \Log::error('Error al crear el registro: ' . $e->getMessage());
        
            return response()->json([
                'error' => 'Ocurrió un error al crear el registro'
            ], 500);
        }
        
    }

    // Obtener todos los registros de la tabla
    public function index(): JsonResponse
    {
        $differentialFocuses = DifferentialFocus::all();
        return response()->json($differentialFocuses);
    }

    // Obtener un registro específico por ID
    public function show($id): JsonResponse
    {
        $differentialFocus = DifferentialFocus::findOrFail($id);
        return response()->json($differentialFocus);
    }

    // Actualizar un registro existente
    public function update(Request $request, $id): JsonResponse
    {
        $validated = $request->validate([
            'people_id' => 'required|integer|exists:people,people_id',
            'focus_name' => "nullable|in:reintegrado,desmovilizado,extrema pobreza",
            'grupo_etnico' => "nullable|in:Negro,Afrocolombiano,raizal,palanquero",
            'acreditacion_grupo_etnico' => 'nullable|string|max:255',
            'certificado_discapacidad' => 'nullable|boolean',
            'tipo_discapacidad' => "nullable|in:Fisica,Auditiva,Visual,Intelectual",
            'cuidador_cuidadora' => 'nullable|boolean',
            'campesino_campesina' => 'nullable|boolean',
            'victima_conflicto' => 'nullable|boolean',
            'reincorporacion_reintegracion' => 'nullable|boolean',
            'madre_cabeza_familia' => 'nullable|boolean',
            'madre_gestante_lactante' => 'nullable|boolean',
            'sisben' => 'nullable|in:A,B,C,D,Ninguno',

        ]);

        $differentialFocus = DifferentialFocus::findOrFail($id);
        $differentialFocus->update($validated);

        return response()->json([
            'message' => 'Registro actualizado con éxito',
            'data' => $differentialFocus
        ]);
    }

    // Eliminar un registro por ID
    public function destroy($id): JsonResponse
    {
        $differentialFocus = DifferentialFocus::findOrFail($id);
        $differentialFocus->delete();

        return response()->json([
            'message' => 'Registro eliminado con éxito'
        ]);
    }
}
