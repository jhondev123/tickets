<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\EmployeeService;

class EmployeeController extends Controller
{
    public function __construct(private EmployeeService $employeeService)
    {
        $this->employeeService = $employeeService;
    }
    public function index(Request $request)
    {
        $this->employeeService->getAllEmployees($request);
    }

    public function store(Request $request)
    {
        $this->employeeService->store($request);
    }

    public function show(string $id)
    {
        $this->employeeService->getEmployeeById($id);
    }


    public function update(Request $request, string $id)
    {
        return $this->employeeService->update($id, $request);
    }

    public function destroy(string $id)
    {
        return $this->employeeService->destroy($id);
    }
}
