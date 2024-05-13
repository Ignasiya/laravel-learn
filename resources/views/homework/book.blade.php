<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('includes.head')
</head>
<body class="font-sans antialiased bg-gray-100">
<div class="flex flex-col min-h-screen">
    <form class="container mx-auto p-4 flex-grow flex flex-col justify-center gap-2" method="post"
          action="{{route('form_book.create')}}">
        @csrf
        <label>Title:
            <input class="border rounded px-2" type="text" name="title"
                   value="@if($book) {{$book->title}} @endif" required/>
        </label>
        <label>Author:
            <input class="border rounded px-2" type="text" name="author"
                   value="@if($book) {{$book->author}} @endif" required/>
        </label>

        <label> Choose Genre:
            <select name="genre">
                <option value="fantasy" @if($book && $book->genre === 'fantasy') selected @endif>Fantasy</option>
                <option value="sci-fi" @if($book && $book->genre === 'sci-fi') selected @endif>Sci-fi</option>
                <option value="mystery" @if($book && $book->genre === 'mystery') selected @endif>Mystery</option>
                <option value="drama" @if($book && $book->genre === 'drama') selected @endif>Drama</option>
            </select>
        </label>

        <button type="submit" class="border bg-gray-800 text-white rounded max-w-xl">Submit</button>
        @if(session('success'))
            {{ session('success') }}
        @endif
        @foreach($errors->all() as $error)
            <p class="text-red-500">{{$error}}</p>
        @endforeach
    </form>
</div>
</body>
</html>
