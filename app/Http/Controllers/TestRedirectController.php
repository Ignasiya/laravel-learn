<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TestRedirectController extends Controller
{
    public function __invoke(): RedirectResponse
    {
        // Внешний ресурс
        // return redirect()->away('https://google.com');

        // Экшен контроллера
        // return redirect()->action([LibraryUserController::class, 'show'], ['id' => 0]);

        // Роут
        // return redirect()->route('book.show');

        // Назад
        return back();
    }
}
