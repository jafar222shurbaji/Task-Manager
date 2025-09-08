<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Http\Requests\AddCategoryRequest;
use App\Models\Category;

class TaskController extends Controller
{

    public function AddCategoriesToTask(AddCategoryRequest $request, $taskId)
    {
        $task = Task::find($taskId);
        if (!$task) {
            return response()->json([
                "message" => "TaskId not found",
                "Error" => "404"
            ], 404);
        }
        $task = Task::findOrFail($taskId);
        $task->categories()->attach($request->all());
        return response()->json("Category attacheed", 200);
    }


    public function GetCategoryTask($taskId)
    {
        $categories = Task::findOrFail($taskId)->categories;
        return response()->json($categories, 200);
    }

    public function CategoryForWho($taskId)
    {
        $tasks = Category::findOrFail($taskId)->tasks;
        return response()->json($tasks, 200);
    }


    public function index()
    {
        $tasks = Task::all();
        return response()->json($tasks, 200);
    }


    public function store(StoreTaskRequest $request)
    {
        $task = Task::create($request->validated());
        return response()->json($task, 201);
    }


    public function update(StoreTaskRequest $request, $id)
    {
        $task = Task::find(id: $id);
        $task->update($request->validated());
        return response()->json($task, 200);
    }



    public function show(int $id)
    {
        if (!is_numeric($id)) {
            return response()->json(["message" => "Please enter a numeric ID"], 400);
        }
        $task = Task::find($id);
        if (!$task) {
            return response()->json(["message" => "ID not found, please try another one"], 404);
        }
        return response()->json($task);
    }



    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();
        return response()->json(null, 204);
    }
}

