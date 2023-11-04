<!DOCTYPE html>
@include('base')
<body>
    @include('components.navbar')

    <a class='primary-btn' href="{{ route('post_create') }}">Create post</a>

    <main>
        <h1>List of posts:</h1>

        @foreach ($posts as $key => $value)
        <ul>
            <li>{{ $key }} => {{ $value }}</li>
        </ul>
        @endforeach
    </main>

</body>

</html>
