<!DOCTYPE html>

@include('base')

<body>

    @include('components.navbar')

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
