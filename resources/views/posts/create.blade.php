<!DOCTYPE html>

@include('base')

<body>

    @include('components.navbar')

    <main>
        <h1>Post something:</h1>
        <form method='post' action="{{ route('post_create') }}">
            @csrf

            <label for='title'>Title:</label>
            <input id='title' name='title' placeholder='Thinking about stuff...'></input>

            <label for='body'>Body:</label>
            <textarea id='body' name='body'></textarea>

            @foreach($errors->all() as $error)
            <span class='error'><strong> - </strong>{{ $error }}</span>
            @endforeach

            <button type='submit'>Submit</button>
        </form>
    </main>

</body>

</html>
