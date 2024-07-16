<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeService
{
    public function getAllEmployees()
    {
        return Employee::all();
    }
    public function getEmployeesBySearch(Request $request)
    {
        $query = Employee::query();

        if ($request->has('cpf')) {
            $query->where('cpf', $request->input('cpf'));
        }

        if ($request->has('id')) {
            $query->where('id', $request->input('id'));
        }

        if ($request->has('name')) {
            $query->where('name', 'like', "%{$request->input('name')}%");
        }

        return $query->get();
    }

    public  function getEmployeeById($id)
    {
        return Employee::findOrFail($id);
    }
    public  function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'cpf' => 'required|string|size:11|unique:employees,cpf',
            'situation' => 'required|in:A,I',
        ]);

        $employee = Employee::create([
            'name' => $validatedData['name'],
            'cpf' => $validatedData['cpf'],
            'situation' => $validatedData['situation'],
        ]);

        return $employee;
    }
    public  function update($id, $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'cpf' => 'required|string|size:11|unique:employees,cpf,' . $id,
            'situation' => 'required|in:A,I',
        ]);
        $employee = Employee::findOrFail($id);
        $employee->update([
            'name' => $validatedData['name'],
            'cpf' => $validatedData['cpf'],
            'situation' => $validatedData['situation'],
        ]);

        return $employee;
    }
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();
        return response()->json(null, 204);
    }
}
