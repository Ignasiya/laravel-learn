<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Список пользователей</title>
</head>
<table>
    @foreach($users as $user)
        <tr>
            <td>
                {{$user->name}}
            </td>
        </tr>
    @endforeach
</table>
</html>
