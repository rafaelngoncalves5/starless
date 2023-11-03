<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hello, my new index!</title>
</head>
<body>

    <h1>List of posts:</h1>

    @foreach ($posts as $key => $value)
    <ul>
        <li>{{ $key }} => {{ $value }}</li>
    </ul>
    @endforeach
    
</body>

</html>
