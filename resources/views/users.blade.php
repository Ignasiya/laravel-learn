<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Список пользователей</title>
</head>
<body>
@php
    $greenUser = 2;
@endphp
<table border="3px">
    @foreach($users as $key => $user)
        <tr>
            <td>
                {{$key + 1}}
            </td>
            @if($key === $greenUser)
                <td style="background-color: green">
                    {{$user}}
                </td>
            @elseif($key === 4)
                <td>
                    <b>{{$user}}</b>
                </td>
            @else
                <td>
                    {{$user}}
                </td>
            @endif
        </tr>
    @endforeach
</table>
</body>

</html>
