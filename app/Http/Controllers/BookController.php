<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookStoreRequest;
use App\Models\Book;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class BookController extends Controller
{
    public function index(int $id = null): View|Application|Factory
    {
        return view('homework/book', [
            'book' => $id ? Book::where('id', $id)->first() : null
        ]);
    }

    public function store(BookStoreRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $book = Book::create($data);

        return Redirect::route('form_book.show', ['id' => $book->id])->with('success', 'Книга успешно создана');
    }
}
