<!DOCTYPE html>

@include('base')

<body>

    @include('components.navbar')

    <h1>Post your stuff here!</h1>
    <form method='post' action="{{ route('post_create') }}">
        @csrf

        <label for='title'>Title:</label>
        <input id='title' name='title' placeholder='Thinking about stuff...'></input>

        <label for='body'>Body:</label>
        <textarea id='body' name='body'></textarea>

        <button type='submit'>Submit</button>
    </form>

    @if (request()->getMethod() === 'POST')
    <p>Data received => {{ print_r($new_post) }} created with success!</p>
    @else
    <p>Sua request não é POST</p>
    @endif

</body>

</html>
