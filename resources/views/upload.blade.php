<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Upload</title>
</head>
<body>
<form name="file-upload" method="post" enctype="multipart/form-data" action="{{route('file.upload')}}">
    @csrf
    <div>
        <label for="file_name">Name</label>
        <input type="text" id="file_name" name="file_name" required/>
        <input type="file" name="file_uploaded[]"/>
        <input type="file" name="file_uploaded[]"/>
    </div>
    <button type="submit">Submit</button>
</form>
</body>
</html>
