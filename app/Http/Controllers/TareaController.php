<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarea;

class TareaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getAll() 
    {
        $tareas = Tarea::all();
        return response()->json($tareas);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function post(Request $request)
    {
        //
        $tarea = new Tarea();
        $tarea->nombre = $request->nombre;
        $tarea->fecha = $request->fecha;
        $tarea->estado = $request->estado;
        $tarea->save();
        return response()->json($tarea);
    }

    /**
     * Display the specified resource.
     */
    public function getById(string $id)
    {
        //
        $tarea = Tarea::find($id);
        return response()->json($tarea);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $tarea = Tarea::find($id);
        $tarea->nombre = $request->nombre;
        $tarea->fecha = $request->fecha;
        $tarea->estado = $request->estado;
        $tarea->save();
        return response()->json($tarea);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $tarea = Tarea::find($id);
        $tarea->delete();
        return response()->json($tarea);
    }
}
