<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\ProjectController;
use App\Http\Controllers\Api\V1\PropertyController;

Route::get('properties', [PropertyController::class, 'index']);
Route::post('property', [PropertyController::class, 'store']);
Route::put('property/{property}', [PropertyController::class, 'update']);
Route::delete('property/{property}', [PropertyController::class, 'destroy']);

Route::get('projects', [ProjectController::class, 'index']);
Route::post('project', [ProjectController::class, 'store']);
Route::put('project/{project}', [ProjectController::class, 'update']);
Route::delete('project/{project}', [ProjectController::class, 'destroy']);
