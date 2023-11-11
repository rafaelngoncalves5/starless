<!DOCTYPE html>
@include('base')
<body>
    @include('components.navbar')

    <a class='primary-btn' style='text-decoration: none; float: right; margin: 2rem; padding: 0.5rem 1.5rem; font-weight: bolder; font-size: 5vh;' href="{{ route('post_create') }}">+</a>

    <main>
        @foreach ($posts as $post)
        <ul>
            <li class='odd-li'><strong>Title</strong> - {{ $post['title'] }}</li>

            <img src="{{ asset('/uploads/'. $post->picture) }}" alt="{{ $post->picture }}" />

            <li><strong>Body</strong> - {{ $post['body'] }}</li>

            <li><strong>Created at - </strong>{{ $post['created_at'] }}</li>

            <li><strong><a href="{{ route('post_like', $post['id']) }}" style='background: none; border: 0; cursor: pointer; text-decoration: none;'>💗</a></button></strong> - {{ $post['likes_counter'] }}</li>

            {{-- ... --}}

            @foreach($users as $user)
            @if ($user['id'] === $post['user_id'])
            <li><strong>Posted by</strong> - {{ "@$user->username" }}</li>
            @endif
            @endforeach
            <li><strong>Posted by</strong> - {{ $post['user_id'] }}</li>

            @if (Auth::check())

            @if ($post['user_id'] == Auth::user()->id || Auth::user()->is_admin)
            <div style='margin: 1rem 0; display: flex; justify-content: center;'>

                <a href="{{ route('post_update', $post['id']) }}" class='primary-btn' style='background-color: var(--accent-color); color: var(--primary-color); text-decoration: none; font-size: larger;  font-weight: bold;'>Edit</a>

                <form method='post' action="{{ route('post_delete', $post['id']) }}">
                    @csrf
                    @method('DELETE')
                    <button type='submit' class='primary-btn' style='text-decoration: none; font-size: larger; font-weight: bold;'>Delete</button>
                </form>

            </div>
            @endif
            @endif

        </ul>
        @endforeach
    </main>

</body>

</html>
