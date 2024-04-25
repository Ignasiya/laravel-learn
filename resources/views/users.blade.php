<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Список пользователей</title>
</head>
<table border="2">
    @foreach($users as $user)
        <tr>
            <td>
                {{$user->name}}
            </td>
        </tr>
    @endforeach
</table>
</html>
