<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;


class FormProcessor extends Controller
{
    public function index()
    {
        return view('formProcessor');
    }

    public function store(Request $request)
    {
        $userData = $request->only(['first_name', 'last_name', 'email']);

        // $response = response()->json($userData);

        return view('hello', ['user' => $userData]);
    }
}
