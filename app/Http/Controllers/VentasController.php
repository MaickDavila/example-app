<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venta;

class VentasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getAll()
    {
        //
        $ventas = Venta::all();
        return response()->json($ventas);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function post(Request $request)
    {
        //
        $venta = new Venta();
        $venta->nombre_producto = $request->nombre_producto;
        $venta->precio = $request->precio;
        $venta->cantidad = $request->cantidad;
        $venta->total = $request->total;
        $venta->save();
        return response()->json($venta);
    }

    /**
     * Display the specified resource.
     */
    public function getById(string $id)
    {
        //
        $venta = Venta::find($id);
        return response()->json($venta);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $venta = Venta::find($id);
        $venta->nombre_producto = $request->nombre_producto;
        $venta->precio = $request->precio;
        $venta->cantidad = $request->cantidad;
        $venta->total = $request->total;
        $venta->save();
        return response()->json($venta);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $venta = Venta::find($id);
        $venta->delete();
        return response()->json($venta);
    }
}
