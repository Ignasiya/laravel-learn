@extends('layouts.default')

@section('content')
    <p class="text-blue-500">Имя: <span class="text-green-700">{{$name}}</span></p>
    @if($age > 18)
        <p class="text-blue-500">Возраст: <span class="text-green-700">{{$age}}</span></p>
    @else
        <p class="text-red-500">{{$name}} слишком молод</p>
    @endif
    <p class="text-blue-500">Должность: <span class="text-green-700">{{$position}}</span></p>
    <p class="text-blue-500">Адрес: <span class="text-green-700">{{$address}}</span></p>
@stop
