<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CookieTestController extends Controller
{
    public function testCookie(Request $request): void
    {
        $sessionIdentify = $request->cookie('laravel_session');
        $session = $request->session();

        echo $sessionIdentify . ' ';

        echo $session->get('_token');
    }
}
