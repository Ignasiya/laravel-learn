<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function show()
    {
        $users = DB::connection('mysql')
            ->table('users')
            ->select(['name', 'email'])
            ->get();

        print_r($users);
    }
}
