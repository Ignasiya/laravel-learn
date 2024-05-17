<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('includes.head')
</head>
<body class="font-sans antialiased bg-gray-100">
<div class="flex flex-col min-h-screen">
    <div class="container mx-auto p-4 flex-grow flex flex-col justify-center gap-2">
        <p class="text-blue-500">Name: {{$user->name}}</p>
        <p class="text-blue-500">Surname: {{$user->surname}}</p>
        <p class="text-blue-500">Email: {{$user->email}}</p>
    </div>
    @foreach($errors->all() as $error)
        <p class="text-red-500">{{$error}}</p>
    @endforeach
</div>
</body>
</html>
