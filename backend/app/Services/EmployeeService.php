<?php

namespace App\Services;
use Illuminate\Http\Request;
use App\Models\Employee;
class EmployeeService
{
    public static function getAllEmployees()
    {
        return Employee::all();
    }
    public static function getEmployeesBySearch(Request $request)
    {
        
    }

    public static function getEmployeeById($id)
    {
        
    }
    public static function store(Request $request)
    {
        
    }
    public static function update($id)
    {
        
    }
    public static function destroy($id)
    {
        
    }
}