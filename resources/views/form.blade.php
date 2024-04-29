<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form name="add-blog-post-form" id="add-blog-post-form" method="post" action="{{route('user.create')}}">
    @csrf
    <div>
        <label for="username">Name</label>
        <input type="text" id="username" name="username" required/>
        <label for="email">E-mail</label>
        <input type="email" id="email" name="email" required/>
    </div>
    <button type="submit">Submit</button>
</form>
</body>
</html>
