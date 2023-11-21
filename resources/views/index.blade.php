<!DOCTYPE html>

@include('base')

<body>

    @include('components.navbar')

    <main>
        <h1>Routes:</h1>

        @if (Auth::check())
        <p style='font-size: smaller;'>Hello <strong>{{ Auth::user()->username }}</strong></p>
        @endif

        <ul>
            <li style='box-shadow:none;'>
                <a href="{{ route('post_index') }}">Posts <strong>[CRUD]</strong></a>
            </li>

            <hr />

            <li style='box-shadow:none;'>
                <a href="{{ route('user_create') }}">Sign Up</a>
            </li>

            <li style='box-shadow: none;'>
                @if (Auth::check())
                <a href="{{ route('logout') }}">Logout</a>

                @else
                <a href="{{ route('login') }}">Login</a>
                @endif
            </li>

            <hr />

            <li style='box-shadow:none;'>
                <a href="/api/">REST API</a>
            </li>

            <li style='box-shadow:none;'>
                <a href="/curriculum/">Curriculum</a>
            </li>

        </ul>
    </main>

</body>

</html>
