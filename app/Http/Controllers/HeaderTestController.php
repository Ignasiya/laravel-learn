<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HeaderTestController extends Controller
{
    public function getHeader(Request $request): void
    {
        $userAgent = $request->header('User-Agent');

        echo $userAgent . ' ';

        echo $request->header('My-Header', 'default');
    }
}
