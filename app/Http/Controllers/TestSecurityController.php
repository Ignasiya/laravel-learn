<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestSecurityController extends Controller
{
    public function index()
    {
        return view('test_csrf');
    }

    public function post(Request $request): void
    {
        echo $request->input('name');
    }
}
