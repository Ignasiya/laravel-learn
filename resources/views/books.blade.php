<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Books</title>
</head>
<body>
<table>
@foreach($books as $key => $book)
    <tr><td>{{ $book }}</td><td><a href="{{route('book.delete', $key)}}">delete</a></td></tr>
@endforeach
</table>
<form name="add-new-book" id="add-new-book" method="post" action="{{route('book.create')}}">
    @csrf
    <div>
        <label for="book_name">Name</label>
        <input type="text" id="book_name" name="book_name" required/>
    </div>
    <button type="submit">Submit</button>
</form>
</body>
</html>
