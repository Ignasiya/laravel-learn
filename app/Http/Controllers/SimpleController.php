<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SimpleController extends Controller
{
    public function test(Request $request): JsonResponse
    {
        $response = ['param' => $request->param];

        // return new Response(json_encode($response));
        return response()->json($response);
    }
}
