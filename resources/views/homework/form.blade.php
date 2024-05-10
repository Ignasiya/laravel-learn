<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('includes.head')
</head>
<body class="font-sans antialiased bg-gray-100">
<div class="flex flex-col min-h-screen">
    <form class="container mx-auto p-4 flex-grow flex flex-col justify-center gap-2" name="employee-form" id="employee-form" method="post" action="{{route('employee.create')}}">
        @csrf
        <div class="">
            <label for="firstname">Имя</label>
            <input type="text" id="firstname" name="first_name" class="px-1" required/>
        </div>

        <div class="">
            <label for="lastname">Фамилия</label>
            <input type="text" id="lastname" name="last_name" class="px-1" required/>
        </div>

        <div class="">
            <label for="age">Возраст</label>
            <input type="number" id="age" name="age" class="px-1" required/>
        </div>

        <div class="">
            <label for="position">Должность</label>
            <input type="text" id="position" name="position" class="px-1" required/>
        </div>

        <div class="">
            <label for="address">Адрес проживания</label>
            <input type="text" id="address" name="address" class="px-1" required/>
        </div>

        <div class="">
            <label for="email">E-mail</label>
            <input type="email" id="email" name="email" class="px-1" required/>
        </div>

        <div>
            <label for="workData">Описание(JSON)</label>
            <textarea id="workData" name="workData" class=""></textarea>
        </div>

        <button type="submit" class="border bg-gray-800 text-white rounded max-w-xl">Submit</button>
    </form>
</div>

</body>
</html>
