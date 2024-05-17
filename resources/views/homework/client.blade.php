<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('includes.head')
</head>
<body class="font-sans antialiased bg-gray-100">
<div class="flex flex-col min-h-screen">
    <form class="container mx-auto p-4 flex-grow flex flex-col justify-center gap-2" method="post"
          action="{{route('client.create')}}">
        @csrf

        <label>Name:
            <input class="border rounded px-2" type="text" name="name" required/>
        </label>
        <label>Surname:
            <input class="border rounded px-2" type="text" name="surname" required/>
        </label>
        <label>Email:
            <input class="border rounded px-2" type="email" name="email" required/>
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
