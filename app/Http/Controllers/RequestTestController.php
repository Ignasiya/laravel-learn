<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RequestTestController extends Controller
{
    public function testRequest(Request $request): void
    {
        $firstName = $request->input('first_name', 'No name');
        $lastName = $request->input('last_name', 'No name');

        $allParam = $request->all();

        $collectParam = $request->collect();

        echo $firstName . ' ' . $lastName;

        print_r($allParam);

        echo $allParam['first_name'];

        $collectParam->each(function ($field) {
            echo $field . ' ';
        });

        var_dump($collectParam);
    }
}
