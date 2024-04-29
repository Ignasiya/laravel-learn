<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Homework 2</title>
</head>
<body>
<form name="add-user-form" id="add-user-form" method="post" action="{{ route('form_processor.create') }}">
    @csrf
    <div>
        <label for="first_name">Name</label>
        <input type="text" id="first_name" name="first_name" required/>
        <label for="last_name">Last Name</label>
        <input type="text" id="last_name" name="last_name" required/>
        <label for="email">E-mail</label>
        <input type="email" id="email" name="email" required/>
    </div>
    <button type="submit">Submit</button>
</form>
</body>
</html>
