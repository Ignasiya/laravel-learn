<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('includes.head')
</head>
<body class="mx-auto my-4 flex flex-col gap-5 justify-center items-center">
<form class="flex flex-col gap-3" action="{{route('validation.post')}}" method="post">
    @csrf
    <label class="flex justify-between @error('name') bg-red-200 @enderror">  Name:
        <input class="border rounded px-2" type="text" name="name"/>
    </label>

    <label class="flex justify-between @error('password') bg-red-200 @enderror">  Password:
        <input class="border rounded px-2" type="password" name="password"/>
    </label>

    <label class="flex justify-between">Confirm password:
        <input class="border rounded px-2" type="password" name="confirm"/>
    </label>

    <input class="bg-gray-300/50 rounded" type="submit" value="Send"/>
</form>
@foreach($errors->all() as $error)
    <p class="text-red-500">{{$error}}</p>
@endforeach
</body>
</html>
