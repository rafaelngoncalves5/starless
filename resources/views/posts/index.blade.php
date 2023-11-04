<!DOCTYPE html>
@include('base')
<body>
    @include('components.navbar')

    <a class='primary-btn' style='text-decoration: none; float: right; margin: 2rem; padding: 0.5rem 1.5rem; font-weight: bolder; font-size: 5vh;' href="{{ route('post_create') }}">+</a>

    <main>
        @foreach ($posts as $post)
        <ul>
            <li class='odd-li'><strong>Title</strong> - {{ $post['title'] }}</li>

            <li><strong>Body</strong> - {{ $post['body'] }}</li>

            <li><strong>Created at - </strong>{{ $post['created_at'] }}</li>

            <li><strong><button style='background: none; border: 0; cursor: pointer;'>💗</button></strong> - {{ $post['likes_counter'] }}</li>

            <li><strong>Posted by</strong> - {{ $post['user_id'] }}</li>

            <div style='margin: 1rem 0; display: flex; justify-content: center;'>

                <form method='post' action="">
                    @csrf
                    @method('PUT')
                    <button type='submit' class='primary-btn' style='background-color: var(--accent-color); color: var(--primary-color); text-decoration: none; font-size: larger;  font-weight: bold;'>Edit</button>
                </form>

                <form method='post' action="{{ route('post_delete', $post['id']) }}">
                    @csrf
                    @method('DELETE')
                    <button type='submit' class='primary-btn' style='text-decoration: none; font-size: larger; font-weight: bold;'>Delete</button>
                </form>

            </div>

        </ul>
        @endforeach
    </main>

</body>

</html>
