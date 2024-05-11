<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('includes.head')
</head>
<body class="mx-auto my-4 flex justify-center items-center">
<form class="flex flex-col gap-3" action="{{route('security.post')}}" method="post" name="my-form">
    @csrf

    <label>Name:
        <input class="border rounded px-2" type="text" name="name"/>
    </label>

    <input class="bg-gray-300/50 rounded" type="submit" value="Send"/>
</form>
</body>
</html>
