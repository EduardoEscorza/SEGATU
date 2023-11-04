<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Alumno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AlumnoController extends Controller
{
    
    public function create(Request $request)
    {
        if ($request->id == 0) {
            $alumno = new Alumno();
        } else {
            $alumno = Alumno::find($request->id);
        }

        $alumno->nombres = $request->nombres;
        $alumno->apellidos = $request->apellidos;
        $alumno->grupo = $request->grupo;
        $alumno->evaluaciones = $request->evaluaciones;

        $alumno->save();

        Log::channel('custom')->info('Alumno creado/modificado: ' . $alumno->id); // Registro de información

        return $alumno;
    }

    public function get(Request $request)
    {
        $alumno = Alumno::find($request->id);

        if ($alumno) {
            Log::channel('custom')->info('Obtenido alumno: ' . $alumno->id); // Registro de información
        } else {
            Log::channel('custom')->warning('alumno no encontrado: ' . $request->id); // Registro de advertencia
        }

        return $alumno;
    }

    public function list()
    {
        $alumnos = Alumno::all();

        Log::channel('custom')->info('Obtenida lista de alumnos'); // Registro de información

        return $alumnos;
    }

    public function delete(Request $request)
    {
        $alumno = Alumno::find($request->id);

        if ($alumno) {
            $alumno->delete();
            Log::channel('custom')->info('alumno eliminado: ' . $alumno->id); // Registro de información
        } else {
            Log::channel('custom')->warning('alumno no encontrado para eliminar: ' . $request->id); // Registro de advertencia
        }

        return "Ok";
    }
}
