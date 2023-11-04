<!DOCTYPE html>

@include('base')

<main>

    @include('components.navbar')

    <h1>Post your stuff here!</h1>
    <form method='post' action="{{ route('user_create') }}">
        @csrf

        <label for='username'>Username:</label>
        <input id='username' name='username' placeholder='johndoe5'></input>

        <label for='email'>Email:</label>
        <input id='email' name='email' placeholder='johndoe5@mail.com'></input>

        <label for='password'>Password:</label>
        <input id='password' name='password' type='password'></input>

        <button type='submit'>Submit</button>
    </form>
</main>

</body>

</html>
