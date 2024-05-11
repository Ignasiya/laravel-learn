<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormTestController extends Controller
{
    public function displayForm()
    {
        return view('formles');
    }

    public function postForm(Request $request)
    {
        echo $request->input('name') . PHP_EOL;
        echo $request->input('password') . PHP_EOL;
        var_dump($request->input('category'));
    }
}
