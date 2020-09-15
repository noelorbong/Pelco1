<?php

namespace App\Http\Controllers\Api\V1;
use App\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmployeesController extends Controller
{
    public function index()
    {
        return Employee::all();
    }

    public function show($id)
    {
        return Employee::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);
        $employee->update($request->all());

        return $employee;
    }

    public function store(Request $request)
    {
        $employee = Employee::create($request->all());
        return $employee;
    }

    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();
        return '';
    }
}
