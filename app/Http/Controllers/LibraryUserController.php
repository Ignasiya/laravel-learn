<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LibraryUserController extends Controller
{
    protected $users = [
        ['id' => 0, 'username' => 'user1', 'first_name' => 'vasiliy', 'last_name' => 'pupkin',
            'list_of_books' => ['Book1', 'Book2', 'Book3']],
        ['id' => 1, 'username' => 'user2', 'first_name' => 'nikolay', 'last_name' => 'petrov',
            'list_of_books' => ['Book4', 'Book5', 'Book6']]
    ];
    public function show($id)
    {
        return view('view', ['user' => $this->users[$id]]);
    }
}
