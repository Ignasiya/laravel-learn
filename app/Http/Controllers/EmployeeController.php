<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
                'first_name' => 'required|string|max:255',
                'age' => 'required|string']
        );

        // http://localhost:8000/test_database?first_name=Mib&age=30
        Employee::create([
            'first_name' => $data['first_name'],
            'age' => $data['age']
        ]);

        // Второй вариант
        $employee = new Employee();
        $employee->first_name = $data['first_name'];
        $employee->age = $data['age'];

        $employee->save();
    }
}
