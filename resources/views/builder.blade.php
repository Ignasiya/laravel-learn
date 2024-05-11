<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('includes.head')
</head>
<body class="mx-auto my-4 flex justify-center items-center">
<form class="flex flex-col gap-3" action="{{route('build.post')}}" method="post" name="my-form">
    @csrf
    {!! form($form) !!}

    <input type="submit" value="Отправить"/>
</form>
</body>
</html>

