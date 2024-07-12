<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeeController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get("/login", [AuthController::class, 'login'])->name('login');
Route::post("/register", [AuthController::class, 'register'])->name('register');

Route::get("/employee", [EmployeeController::class, 'index'])
    ->name('employee.index')->middleware('auth:sanctum');

Route::post("/employee", [EmployeeController::class, 'store'])
    ->name('employee.store')->middleware('auth:sanctum');
