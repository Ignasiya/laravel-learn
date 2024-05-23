@php use App\Models\Log; @endphp
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('includes.head')
</head>
<body class="mx-auto my-4 flex justify-center items-center">
<?php
try {
    $result_array = Log::all();

    echo "<div class=\"table\">";
    echo "<table><tr><th>id</th><th>time</th><th>duration</th><th>ip</th><th>url</th><th>method</th><th>input</th></tr>";
    foreach ($result_array as $result_row) {
        echo "<tr>";
        echo "<td align=\"center\">" . $result_row['id'] . "</td>";
        echo "<td align=\"center\">" . $result_row['time'] . "</td>";
        echo "<td align=\"center\">" . $result_row['duration'] . "</td>";
        echo "<td align=\"center\">" . $result_row['ip'] . "</td>";
        echo "<td align=\"center\">" . $result_row['url'] . "</td>";
        echo "<td align=\"center\">" . $result_row['method'] . "</td>";
        echo "<td align=\"center\">" . $result_row['input'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    echo "</div>";

} catch (PDOException $e) {
    echo "Ошибка при создании записи в базе данных: " . $e->getMessage();
}

$db = null;
?>
</body>
</html>
