<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\SetsJsonResponse;

class TaskController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $tasks = Task::with("subtasks")->where([
            "estado" => false,
            "parent_id" => null,
        ])->paginate(15);
        

        return response()->json($tasks);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $task = Task::create([
            "parent_id" => $request->parent_id,
            "titulo" => $request->titulo,
        ]);

        return response()->json($task);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $task = Task::findOrFail($id);
        $task->delete();
        return response()->json("Tarea Eliminada Correctamente!");
    }

    public function complete(Request $request){
        $task = Task::findOrFail($request->task_id);
        $task->status = true;
        $task->save();

        return response()->json("Tarea Completada Correctamente!");
    }
}
