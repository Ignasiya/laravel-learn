<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('includes.head')
</head>
<body class="mx-auto my-4 flex justify-center items-center">
    <form class="flex flex-col gap-3" action="{{route('form.post')}}" method="post" name="my-form">
        @csrf
        <label>Name:
            <input class="border rounded" type="text" name="name"/>
        </label>
        <label>Password:
            <input class="border rounded" type="password" name="password" id="password"/>
        </label>
        <label>Age:
            <input class="border rounded" type="number" name="age" id="age" disabled/>
            <input class="border rounded" type="hidden" value="30" name="hidden"/>
        </label>

        <label> Male:
            <input type="radio" name="gender" value="Male"/>
        </label>
        <label> Female:
            <input type="radio" name="gender" value="Female"/>
        </label>

        <label> Monitors:
            <input type="checkbox" name="category[]" value="monitors"/>
        </label>
        <label> Notebooks:
            <input type="checkbox" name="category[]" value="notebooks"/>
        </label>
        <label> Keyboards:
            <input type="checkbox" name="category[]" value="keyboards"/>
        </label>

        <input type="submit" value="Отправить"/>
    </form>
</body>
</html>
