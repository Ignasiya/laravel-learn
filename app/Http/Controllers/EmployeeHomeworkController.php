<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class EmployeeHomeworkController extends Controller
{
    public function index()
    {
        return view('homework/form');
    }

    public function store(EmployeeRequest $request): JsonResponse
    {
        $userData = $request->validated();

        $json =  $userData['workData'];
        echo $json;

        $employee = Employee::create($userData);

        return response()->json($employee, 201);
    }

    public function update(EmployeeRequest $request, $id): JsonResponse
    {
        $employee = Employee::find($id);

        $employee->update($request->validated());

        return response()->json($employee);
    }

    public function getPath(Request $request): JsonResponse
    {
        $path = $request->path();

        return response()->json(['path' => $path]);
    }

    public function getUrl(Request $request): JsonResponse
    {
        $url = $request->url();

        return response()->json(['url' => $url]);
    }
}
