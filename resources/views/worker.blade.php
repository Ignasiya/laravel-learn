<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('includes.head')
</head>
<body class="mx-auto my-4 flex justify-center items-center">
<form class="flex flex-col gap-3" action="{{route('worker.create')}}" method="post" name="my-form">
    @csrf
    <label class="flex justify-between">Firstname:
        <input class="border rounded px-2" type="text" name="first_name"
               value="@if($worker) {{$worker->first_name}} @endif"/>
    </label>

    <label class="flex justify-between">Lastname:
        <input class="border rounded px-2" type="text" name="last_name"
               value="@if($worker) {{$worker->last_name}} @endif"/>
    </label>

    <label class="flex justify-between">Department:
        <input type="checkbox" name="department[]" value="finance"
               @if($worker && in_array('finance', unserialize($worker->department))) checked @endif/>Finance
        <input type="checkbox" name="department[]" value="it"
               @if($worker && in_array('it', unserialize($worker->department))) checked @endif/>IT
        <input type="checkbox" name="department[]" value="internal-service"
               @if($worker && in_array('internal-service', unserialize($worker->department))) checked @endif/>Internal service
    </label>

    <input class="bg-gray-300/50 rounded" type="submit" value="Send"/>
</form>
</body>
</html>
