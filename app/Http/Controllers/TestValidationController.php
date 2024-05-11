<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class TestValidationController extends Controller
{
    public function index()
    {
        return view('validation');
    }

    public function post(Request $request)
    {
        $data = $request->validate([
            'name' => ['required'],
            'password' => ['min:5']
        ]);

        var_dump($data);
    }
}
