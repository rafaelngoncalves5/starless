<!DOCTYPE html>

<html>

@include('base')

<body>
    @include('components.navbar')
    <main>
        <h1>Welcome to upadate!</h1>

        <form method='post'>

            @csrf
            @method('put')

            <label for='title'>Title:</label>
            <input name='title' id='title' value='{{ $post->title }}'></input>

            <label for='body'>Body:</label>
            <textarea name='body' id='body'>{{ $post->body }}</textarea>

            <br />

            <p>Created at: <span style='color: var(--primary-color);'>{{ $post->created_at }}</span></p>

            @foreach($errors->all() as $error)
            <span class='error'><strong> - </strong>{{ $error }}</span>
            @endforeach

            <button type='submit'>Submit changes</button>

        </form>
    </main>
</body>

</html>
