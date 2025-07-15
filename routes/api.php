<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TaskApiController;

//Route::middleware('auth:sanctum')->get('admin/tasks/events', [TaskApiController::class, 'calendar']);
Route::get('API/tasks/events', [TaskApiController::class, 'events']);
