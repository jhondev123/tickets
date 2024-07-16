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

Route::get("/employees", [EmployeeController::class, 'index'])
    ->name('employees.index')->middleware('auth:sanctum');

Route::get("/employees/search", [EmployeeController::class, 'search'])
    ->name('employees.search')->middleware('auth:sanctum');

Route::get("/employee/{id}", [EmployeeController::class, 'show'])
    ->name('employee.show')->middleware('auth:sanctum');

Route::post("/employee", [EmployeeController::class, 'store'])
    ->name('employee.store')->middleware('auth:sanctum');

Route::put("/employee/{id}", [EmployeeController::class, 'update'])
    ->name('employee.update')->middleware('auth:sanctum');

Route::delete("/employee/{id}", [EmployeeController::class, 'delete'])
    ->name('employee.delete')->middleware('auth:sanctum');
