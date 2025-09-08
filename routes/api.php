<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Models\User;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('tasks', [TaskController::class, 'store']);
Route::get('tasks/{id}', [TaskController::class, 'show']);


//Route::get('getusertasks/{id}',[ UserController::class, 'getusertasks']);


Route::post('tasks/{taskId}/categories', [TaskController::class, 'AddCategoriesToTask']);
Route::get('tasks/categories/{taskId}', [TaskController::class, 'GetCategoryTask']);
Route::get('tasks/tasks/{category_id}', [TaskController::class, 'CategoryForWho']);