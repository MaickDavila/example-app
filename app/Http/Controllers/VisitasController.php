<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visitas;

class VisitasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getAll()
    {
        //
        $visitas = Visitas::all();
        return response()->json($visitas);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function post(Request $request)
    {
        //
        $visitas = new Visitas();
        $visitas->documento = $request->documento;
        $visitas->visitante = $request->visitante;
        $visitas->telefono = $request->telefono;
        $visitas->hora_ingreso = $request->hora_ingreso;
        $visitas->hora_salida = $request->hora_salida;
        $visitas->save();
        return response()->json($visitas);
    }

    /**
     * Display the specified resource.
     */
    public function getById(string $id)
    {
        //
        $visitas = Visitas::find($id);
        return response()->json($visitas);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $visitas = Visitas::find($id);
        $visitas->documento = $request->documento;
        $visitas->visitante = $request->visitante;
        $visitas->telefono = $request->telefono;
        $visitas->hora_ingreso = $request->hora_ingreso;
        $visitas->hora_salida = $request->hora_salida;
        $visitas->save();
        return response()->json($visitas);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $visitas = Visitas::find($id);
        $visitas->delete();
        return response()->json($visitas);
    }
}
