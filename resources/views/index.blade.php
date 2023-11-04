<!DOCTYPE html>

@include('base')

<body>

    @include('components.navbar')

    <main>
        <h1>Routes:</h1>

        <ul >
            <li style='box-shadow:none;'>
                <a href="{{ route('post_create') }}">Create posts</a>
            </li>

            <li style='box-shadow:none;'>
                <a href="{{ route('post_index') }}">See all posts</a>
            </li>

            <hr />

            <li style='box-shadow:none;'>
                <a href="{{ route('user_create') }}">Create User</a>
            </li>

        </ul>
    </main>

</body>

</html>
