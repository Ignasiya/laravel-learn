<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SendFileController extends Controller
{
    public function __invoke()
    {
        return response()->file('uploads/pdf-test.pdf');
    }
}
