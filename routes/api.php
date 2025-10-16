<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\LoginController;

use App\Http\Controllers\Api\V1\ProjectController;
use App\Http\Controllers\Api\Auth\LogoutController;
use App\Http\Controllers\Api\V1\PropertyController;

Route::post('login', LoginController::class);
Route::post('logout', LogoutController::class)->middleware('auth:sanctum');

Route::get('projects', [ProjectController::class, 'index']);
Route::get('properties', [PropertyController::class, 'index']);

Route::middleware('auth:sanctum')->group(function () {
  Route::post('property', [PropertyController::class, 'store']);
  Route::put('property/{property}', [PropertyController::class, 'update']);
  Route::delete('property/{property}', [PropertyController::class, 'destroy']);

  Route::post('project', [ProjectController::class, 'store']);
  Route::put('project/{project}', [ProjectController::class, 'update']);
  Route::delete('project/{project}', [ProjectController::class, 'destroy']);
});
