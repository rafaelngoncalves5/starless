<!DOCTYPE html>

<html>
@include('base')

<body>

    @include('components.navbar')

    <main>
        <h1>Login</h1>

        <form method='post' action="{{ route('login') }}">
            @csrf

            <label for='username'>Username:</label>
            <input id='username' name='username'></input>

            <label for='password'>Password:</label>
            <input id='password' name='password' type='password'></input>

            @foreach($errors->all() as $error)
            <span class='error'><strong> - </strong>{{ $error }}</span>
            @endforeach

            <button type='submit' class='primary-btn'>Submit</button>

        </form>
    </main>

</body>
</html>
