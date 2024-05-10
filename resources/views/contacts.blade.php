@extends('layouts.default')

@section('content')
    <p class="text-blue-500">Адрес: <span class="text-green-700">{{$address}}</span></p>
    <p class="text-blue-500">Почтовый индекс: <span class="text-green-700">{{$post_code}}</span></p>
    @if(strlen($email) > 0)
        <p class="text-blue-500">E-mail: <span class="text-green-700">{{$email}}</span></p>
    @else
        <p class="text-red-500">Адрес электронной почты не указан</p>
    @endif
    <p class="text-blue-500">Телефон: <span class="text-green-700">{{$phone}}</span></p>
@stop
