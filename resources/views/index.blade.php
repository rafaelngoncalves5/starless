<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hello, my new index!</title>
</head>
<body>
    <h1>Core</h1>

    <main>
        <h2>List of routes and functionality:</h2>

        <ul>
            <li>
                <a href="{{ route('post_create') }}">Create posts</a>
            </li>

            <li>    
                <a href="{{ route('post_index') }}">See all posts</a>
            </li>
            
            <hr />

            <li>
                <a href="{{ route('user_create') }}">Create User</a>
            </li>

        </ul>
    </main>

</body>

</html>
