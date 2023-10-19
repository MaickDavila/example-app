<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyecto;

class ProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getAll()
    {
        //
        $proyectos = Proyecto::all();
        return response()->json($proyectos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function post(Request $request)
    {
        //
        $proyecto = new Proyecto();
        $proyecto->nombre = $request->nombre;
        $proyecto->descripcion = $request->descripcion;
        $proyecto->fecha_inicio = $request->fecha_inicio;
        $proyecto->fecha_entrega = $request->fecha_entrega;
        $proyecto->save();
        return response()->json($proyecto);
    }

    /**
     * Display the specified resource.
     */
    public function getById(string $id)
    {
        //
        $proyecto = Proyecto::find($id);
        return response()->json($proyecto);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $proyecto = Proyecto::find($id);
        $proyecto->nombre = $request->nombre;
        $proyecto->descripcion = $request->descripcion;
        $proyecto->fecha_inicio = $request->fecha_inicio;
        $proyecto->fecha_entrega = $request->fecha_entrega;
        $proyecto->save();
        return response()->json($proyecto);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $proyecto = Proyecto::find($id);
        $proyecto->delete();
        return response()->json($proyecto);
    }
}
